<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert($this->getData());
    }

    public function getData(): array {
        $data = [];
        $faker = Factory::create();

        for ($i=0; $i < 100; $i++) {
            $data[] = [
                'user_name' => $faker->name(),
                'content' => $faker->text(150),
                'news_id' => mt_rand(1, 50),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        return $data;
    }
}
