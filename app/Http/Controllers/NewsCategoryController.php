<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class NewsCategoryController extends Controller
{

    public function index(): View
    {
        return \view("categories.news-categories", ["title" => "Категории новостей", "categories" => DB::table('categories')->get()]);
    }

    public function show(string $url_slug): View
    {
        $current_category = DB::table('categories')->select('*')->where('url_slug', $url_slug)->first();
        return \view("categories.news-categories-detail", ['payload' => $current_category, 'title' => $current_category->title]);
    }
}
