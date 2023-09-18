<?php

namespace Database\Seeders;

use App\Enums\News\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news')->insert($this->getData());
    }

    public function getData()
    {
        $quantityNews = 10;
        $news = [];
        for ($i = 0; $i < $quantityNews; $i++) {
            $news[] = [
                'category_id' => fake()->randomNumber(1, 10),
                'title' => fake()->jobTitle(),
                'author' => fake()->userName(),
                'url_slug' => fake()->slug(),
                'image' => fake()->imageUrl(200, 150),
                'status' => fake()->randomElement(Status::getEnums()),
                'description' => fake()->text(100),
                'created_at' => now(),
            ];
        }
        return $news;
    }
}
