<?php

use Illuminate\Database\Seeder;
use App\Period;

class periods extends Seeder
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
                'description' => $faker->realText(),
                'hours'       => $faker->numberBetween(1, 10),
                'status'      => $faker->boolean(),            ]);
        }
        
        Period::insert($data);
    }
}
