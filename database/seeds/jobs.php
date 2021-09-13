<?php

use Illuminate\Database\Seeder;
use App\Job;

class jobs extends Seeder
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
                'name'        => $faker->sentence,
                'description' => $faker->realText(1000),
                'skills'      => $faker->sentence(),
                'time'        => $faker->sentence(),
                'salary'      => $faker->numberBetween(100, 100000),
                'gender'      => $faker->boolean(),
                'status'      => $faker->boolean(),
                
            ]);
        }
        
        Job::insert($data);
    }
}
