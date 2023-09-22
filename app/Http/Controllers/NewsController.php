<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        return \view('news.newsfeed', ['title' => 'Новости', 'h1' => "Лента новостей", 'news' => News::query()->paginate(6)]);
    }

    public function show(string $url_slug): View
    {
        $newsData = News::getOneByField('url_slug', $url_slug);
        return \view('news.news-detail', ['title' => $newsData->title, 'payload' => $newsData]);
    }
}
