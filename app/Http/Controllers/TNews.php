<?php
declare(strict_types=1);

namespace App\Http\Controllers;

trait TNews
{
    public array $news_list = [
        1 => [
            'id' => 1,
            'category_id' => 1,
            'title' => "Новость 1",
            'description' => 'It\'s the first news',
            'author' => 'Admin',
            'created_at' => '12.01.2023',
            'url' => 'news-one',
        ],
        2 => [
            'id' => 2,
            'category_id' => 2,
            'title' => "Новость 2",
            'description' => 'It\'s the second news',
            'author' => 'Admin',
            'created_at' => '12.01.2023',
            'url' => 'news-two',
        ],
        3 => [
            'id' => 3,
            'category_id' => 3,
            'title' => "Новость 3",
            'description' => 'It\'s the thirt news',
            'author' => 'Admin',
            'created_at' => '12.01.2023',
            'url' => 'news-three',
        ],
    ];

    public function getNews(string $url = null): array
    {
        if ($url === null) {
            return $this->news_list;
        }
        $current_news = null;
        foreach ($this->news_list as $news_item) {
            if ($news_item['url'] === $url) {
                $current_news = $news_item;
                break;
            }
        }
        return $current_news;
    }
}
