<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->getData());
    }

    public function getData(): array {
        $data = [];
        $faker = Factory::create();

        for ($i=0; $i < 10; $i++) {
            $data[] = [
                'name' => $faker->name(),
                'email' => $faker->freeEmail,
                'password' => password_hash('12345678', PASSWORD_DEFAULT),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        return $data;
    }
}
