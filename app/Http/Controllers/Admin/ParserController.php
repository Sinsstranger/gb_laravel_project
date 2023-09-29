<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public static array $sources = [
        'lenta' => 'https://lenta.ru/rss',
//        'rambler' => 'https:/news.rambler.ru/rss/tech/',
    ];


    public function __invoke(Request $request, Parser $parserService)
    {
        foreach (static::$sources as $src_name => $src_url) {
            $parserService->parseTheResource($src_name, $src_url)->saveParseData();
        }
        return redirect()->route('admin.news.index');
    }
}
