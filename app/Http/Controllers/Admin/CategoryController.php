<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
//        Category::query()->insert([
//            'title' => $request->get('title'),
//            'url_slug' => trim($request->get('url')),
//            'description' => $request->get('description'),
//            'created_at' => now(),
//        ]);
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
