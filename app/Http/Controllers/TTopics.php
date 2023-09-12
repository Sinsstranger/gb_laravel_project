<?php

namespace App\Http\Controllers;

trait TTopics
{
    private array $categories = [
        1 => [
            'id' => 1,
            'category_id' => 1,
            'title' => 'High Tech',
            'url' => 'high-tech',
        ],
        2 => [
            'id' => 2,
            'category_id' => 2,
            'title' => 'Politics',
            'url' => 'politics',
        ],
        3 => [
            'id' => 3,
            'category_id' => 3,
            'title' => 'Society',
            'url' => 'society',
        ],
    ];

    public function get_category($url)
    {
        $current_category = null;
        foreach ($this->categories as $category) {
            if ($category['url'] === $url) {
                $current_category = $category;
                break;
            }
        }
        return $current_category;
    }
}
