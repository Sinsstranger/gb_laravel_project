<?php

namespace App\Http\Controllers\Admin;

use App\Enums\News\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\Create;
use App\Http\Requests\Admin\News\Edit;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return \view('admin.topics-list', ['topics' => Category::query()->paginate(6)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('admin.create-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Create $request)
    {
        $category = new Category([
            'title' => $request->get('title'),
            'url_slug' => trim($request->get('url')),
            'description' => $request->get('description'),
            'created_at' => now(),
        ]);
        if($category->save()){
            return redirect()->route('admin.categories.index')->with('success', 'Категория успешно создана');
        }
        return back()->with('error', 'Не удалось создать категорию');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Edit $request, string $id)
    {
        $category = new Category([
            'title' => $request->get('title'),
            'url_slug' => trim($request->get('url')),
            'description' => $request->get('description'),
            'created_at' => now(),
        ]);
        if($category->save()){
            return redirect()->route('admin.categories.index')->with('success', 'Категория успешно изменена');
        }
        return back()->with('error', 'Не удалось отредактировать категорию');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category_id = $category->id;
        if ($category->delete()) {
            return redirect()->route('admin.categories.index')->with('success', 'Категория ' . $category_id . ' успешно удалена');
        }
        return back()->with('error', 'Не удалось удалить категорию');
    }
}
