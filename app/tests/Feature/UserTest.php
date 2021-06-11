<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_news()
    {
        $response = $this->get('news');
        $response->assertStatus(200)
            ->assertSee('Новость');
    }

    public function test_one_news()
    {
        $id = rand(1, 5);
        $response = $this->call('GET', 'news', ['id' => $id]);
        $response->assertStatus(200)
            ->assertSee($id);
    }

    public function test_create_news() {
        $response = $this->get('admin/news/create')
            ->assertStatus(200)
            ->assertSee('Добавить')
            ->assertDontSee('Удалить');
    }

    public function test_categories() {
        $response = $this->get('admin/category')
            ->assertStatus(200)
            ->assertSee('Музыка')
            ->assertDontSee('Игры');
    }
}
