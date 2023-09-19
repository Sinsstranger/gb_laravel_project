<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert($this->getData());
    }

    public function getData(): array
    {
        return [
            [
                'title' => 'Политика',
                'url_slug' => 'politics',
                'description' => fake()->text(100),
                'created_at' => now()
            ],
            [
                'title' => 'Спорт',
                'url_slug' => 'sport',
                'description' => fake()->text(100),
                'created_at' => now()
            ],
            [
                'title' => 'Хай-тек',
                'url_slug' => 'high-tech',
                'description' => fake()->text(100),
                'created_at' => now()
            ],
        ];
    }
}
