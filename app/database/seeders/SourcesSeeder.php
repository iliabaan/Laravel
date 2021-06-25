<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert($this->getData());
    }

    public function getData(): array
    {
        return [
            [
                'title' => 'Yandex',
                'url' => 'https://news.yandex.ru/sport.rss',
                'description' => 'Спорт',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Yandex',
                'url' => 'https://news.yandex.ru/music.rss',
                'description' => 'Музыка',
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Yandex',
                'url' => 'https://news.yandex.ru/culture.rss',
                'description' => 'Культура',
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Yandex',
                'url' => 'https://news.yandex.ru/business.rss',
                'description' => 'Бизнес',
                'category_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Yandex',
                'url' => 'https://news.yandex.ru/society.rss',
                'description' => 'Общество',
                'category_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
    }
}
