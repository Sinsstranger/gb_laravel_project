<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsCategoryController extends Controller
{
    use TTopics;

    public function index(): View
    {
        return \view("categories.news-categories", ["title" => "Категории новостей", "categories" => $this->categories]);
    }

    public function show($url): View
    {
        $current_category = $this->get_category($url);
        return \view("categories.news-categories-detail", ['payload' => $current_category, 'title' => $current_category['title']]);
    }
}
