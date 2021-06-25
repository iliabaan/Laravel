<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    public function getData(): array
    {
        $data = [
            [
                'title' => 'Спорт',
                'description' => 'Спорт',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Музыка',
                'description' => 'Музыка',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Культура',
                'description' => 'Культура',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Бизнес',
                'description' => 'Бизнес',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Общество',
                'description' => 'Общество',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        array_push($data, [
                'title' => 'Другое',
                'description' => 'Стандартная категория',
                'created_at' => now(),
                'updated_at' => now()]
        );
        return $data;
    }
}
