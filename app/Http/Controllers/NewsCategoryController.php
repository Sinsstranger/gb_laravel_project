<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    use Tnews;
    public function index(){
        return \view("news.news-categories", ["title" => "Категории новостей", "categories" => $this->getCategories()]);
    }
}
