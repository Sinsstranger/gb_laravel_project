<?php

namespace App\Http\Controllers\Admin;

use App\Enums\News\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\Create;
use App\Http\Requests\Admin\News\Edit;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.news-list', ['title' => 'Новости', 'h1' => "Список новостей", 'news' => News::query()
            ->join('categories', 'categories.id', 'news.category_id')
            ->select('news.*', 'categories.title as category_title')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $categories = Category::all();
        return \view('admin.create-news', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Create $request): RedirectResponse
    {

        $data = $request->only(['title', 'author', 'status', 'url', 'description', 'category_id',]);

        $news = new News([
            'title' => $data['title'],
            'author' => $data['author'],
            'status' => $data['status'],
            'url_slug' => trim($data['url']),
            'description' => $data['description'],
            'category_id' => $data['category_id'],
        ]);
        if ($news->save()) {
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно создана');
        }
        return back()->with('error', 'Не удалось создать новость');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return \view('admin.edit-news', [
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Edit $request, News $news): RedirectResponse
    {
        $data = $request->only(['title', 'url', 'author', 'status', 'category_id', 'description',]);
        $news->fill($data);
        if ($news->save()) {
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно изменена');
        }
        return back()->with('error', 'Не удалось отредактировать новость');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news): RedirectResponse
    {
        $id = $news->id;
        if ($news->delete()) {
            return redirect()->route('admin.news.index')->with('success', 'Новость ' . $id . ' успешно удалена');
        }
        return back()->with('error', 'Не удалось удалить новость');
    }
}
