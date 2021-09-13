<?php

use Illuminate\Database\Seeder;
use App\Division;

class divisions extends Seeder
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
                'name'        => $faker->sentence(),
                'description' => $faker->realText(),
                'batch'       => $faker->numberBetween(1, 10),
                'price'       => $faker->numberBetween(1, 10),
                'status'      => 1,
                'type'        => $faker->boolean(),
                'gender'      => 1,
            ]);
        }
        
        Division::insert($data);
    }
}
