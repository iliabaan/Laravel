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
        $statuses = ['draft', 'published'];

        for ($i=0; $i < 50; $i++) {
            $data[] = [
                'title' => $faker->sentence(mt_rand(3, 7)),
                'category_id' => mt_rand(1, 10),
                'content' => $faker->text(150),
                'status' => $statuses[mt_rand(0,1)],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        return $data;
    }
}
