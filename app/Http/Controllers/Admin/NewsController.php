<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TNews;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.news-list', ['title' => 'Новости', 'h1' => "Список новостей", 'news' => DB::table('news')
            ->join('categories', 'categories.id', 'news.category_id')
            ->select('news.*', 'categories.title as category_title')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $categories = DB::table('categories')->get();
        return \view('admin.create-news', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();
        DB::table('news')->insert([
            'title' => $data['title'],
            'author' => $data['author'],
            'status' => $data['status'],
            'url_slug' => trim($data['url']),
            'description' => $data['description'],
            'category_id' => $data['category_id'],
            'created_at' => now(),
        ]);
        return redirect()->route('news.news-detail', ['url_slug' => $data['url']]);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
