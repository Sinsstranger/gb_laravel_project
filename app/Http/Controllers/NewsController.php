<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    use Tnews;

    public function index()
    {
        return \view('news.newsfeed', ['title' => 'Новости', 'news' => $this->getNews()]);
    }

    public function show(string $url): array
    {
        return $this->getNews($url);
    }
}
