<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    use TNews;

    public function index(): View
    {
        return \view('news.newsfeed', ['title' => 'Новости', 'h1' => "Лента новостей", 'news' => $this->getNews()]);
    }

    public function show(string $url): View
    {
        $newsData = $this->getNews($url);
        return \view('news.news-detail', ['title' => $newsData['title'], 'payload' => $newsData]);
    }
}
