<?php
declare(strict_types=1);

namespace App\Http\Controllers;

trait Tnews
{
    public function getNews(string $url = null): array
    {
        $news = [];
        $quantity_news = 10;
        if ($url === null) {
            for ($i = 1; $i < $quantity_news; $i++) {
                $news[$i] = [
                    'id' => $i,
                    'title' => \fake()->jobTitle(),
                    'description' => \fake()->text(100),
                    'author' => \fake()->name(),
                    'created_at' => \now()->format('d-m-Y H:i'),
                    'url' => 'url_example',
                ];
            }
            return $news;
        }
        return [
            'id' => \fake()->uuid(),
            'title' => \fake()->jobTitle(),
            'author' => \fake()->name(),
            'created_at' => \now()->format('d-m-Y H:i'),
            'url' => $url
        ];
    }

    public function getCategories()
    {
        $categories = [];
        $quantity_categories = 10;
        for ($i = 1; $i < $quantity_categories; $i++) {
            $categories[$i] = [
                'id' => $i,
                'title' => \fake()->jobTitle(),
            ];
        }
        return $categories;
    }
}
