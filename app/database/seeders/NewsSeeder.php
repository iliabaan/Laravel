<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    public function getData(): array {
        $data = [];
        $faker = Factory::create();

        for ($i=0; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->sentence(mt_rand(3, 10)),
                'category_id' => mt_rand(1, 5),
                'content' => $faker->text(150),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        return $data;
    }
}
