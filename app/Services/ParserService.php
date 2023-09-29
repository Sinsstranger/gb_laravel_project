<?php

namespace App\Services;

use App\Models\Category;
use App\Models\News;
use App\Services\Interfaces\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;

class ParserService implements Parser
{
    public string $link;
    public array $raw_data;
    public static array $parseConf = [
        'lenta' => [
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate,category,enclosure::url]'],
        ],
        'rambler' => [
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate,category]'],
        ],
    ];

    public function setLink(string $link): Parser
    {
        $this->link = $link;
        return $this;
    }

    public function parseTheResource(string $src_name, string $src_url)
    {
        if (isset(static::$parseConf[$src_name]) && !empty(static::$parseConf[$src_name])) {
            $xml = XmlParser::load($src_url);
            $data = $xml->parse(static::$parseConf[$src_name]);
            $this->raw_data = $data;
            return $this;
        }
    }

    public function saveParseData(): void
    {
        foreach ($this->raw_data['news'] as $news) {
            $current_news_category = Category::getOneByField('title', $news['category']);
            $current_category_id = $current_news_category->id ?? null;
            if ($current_news_category === null) {
                $new_category = new Category([
                    'title' => $news['category'],
                    'url_slug' => Str::slug($news['category']),
                    'created_at' => now(),
                ]);
                $new_category->save();
                $current_category_id = $new_category->id;
            }
            if(News::getOneByField('title', $news['title']) === null){
                $news_item =  new News([
                    'category_id' => $current_category_id,
                    'title' => $news['title'],
                    'author' => 'Parser',
                    'url_slug' => Str::slug($news['title']),
                    'image' => $news['enclosure::url'],
                    'status' => 'active',
                    'description' => $news['description'],
                    'created_at' => $news['pubDate'],
                ]);
                $news_item->save();
            }
        }
    }
}
