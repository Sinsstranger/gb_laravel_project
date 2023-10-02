<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Sources\CreateRequest;
use App\Http\Requests\Admin\Sources\EditRequest;
use Illuminate\Http\Request;
use \App\Models\NewsSources as NewsSourcesModel;

class NewsSources extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NewsSourcesModel $sources)
    {
        return view('admin.sources-list', ['h1' => 'News Sources', 'sources' => $sources::query()->paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create-source', ['h1' => 'Create News Source', 'source' => false]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $source = new NewsSourcesModel([
            'name' => $request->get('name'),
            'url' => trim($request->get('url')),
            'created_at' => now(),
        ]);
        if($source->save()){
            return redirect()->route('admin.sources.index')->with('success', 'Источник успешно создан');
        }
        return back()->with('error', 'Не удалось создать источник');
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
    public function edit(NewsSourcesModel $source)
    {
        return view('admin.create-source', ['source' => $source]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, NewsSourcesModel $source)
    {
        $source->fill($request->only('name', 'url'));
        if($source->save()){
            return redirect()->route('admin.sources.index')->with('success', 'Источник успешно изменен');
        }
        return back()->with('error', 'Не удалось отредактировать источник');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsSourcesModel $sources)
    {
        $sources_id = $sources->id;
        if ($sources->delete()) {
            return redirect()->route('admin.categories.index')->with('success', 'Источник ' . $sources_id . ' успешно удален');
        }
        return back()->with('error', 'Не удалось удалить источник');
    }
}
