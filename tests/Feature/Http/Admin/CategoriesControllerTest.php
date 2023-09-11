<?php

namespace Tests\Feature\Http\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_category_index(): void
    {
        $response = $this->get(route('admin.topics.index'));

        $response->assertStatus(200);
        $response->assertSeeText(['Список категорий', 'Society']);
    }
    public function test_category_create():void
    {
        $response = $this->get(route('admin.topics.create'));

        $response->assertStatus(200);
        $response->assertSeeText('Создать категорию');
    }
}
