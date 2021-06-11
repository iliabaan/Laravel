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

    public function getData(): array {
        $data = [];
        $faker = Factory::create();

        for ($i=0; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->word(),
                'description' => $faker->text(150),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        return $data;
    }
}
