<?php

namespace Tests\Feature\Http\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_news_list_getting(): void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
        $response->assertSeeText(['Список новостей', 'Новость 3', env("APP_URL")]);

    }

    public function test_news_creating_form_show(): void
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
        $response->assertSeeText('Создать новость');
    }
}
