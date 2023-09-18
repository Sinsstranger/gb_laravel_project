<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        return \view('news.newsfeed', ['title' => 'Новости', 'h1' => "Лента новостей", 'news' => DB::table('news')->get()]);
    }

    public function show(string $url_slug): View
    {
        $newsData = DB::table('news')->select('*')->where('url_slug', $url_slug)->first();
        return \view('news.news-detail', ['title' => $newsData->title, 'payload' => $newsData]);
    }
}
