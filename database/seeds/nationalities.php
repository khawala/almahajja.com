<?php

use Illuminate\Database\Seeder;
use App\Nationality;

class nationalities extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        $data = [];
        
        for ($i = 1; $i <= 10 ; $i++) {
            array_push($data, [
                'name' => $faker->country,
                'status' => $faker->boolean(),
            ]);
        }
        
        Nationality::insert($data);
    }
}
