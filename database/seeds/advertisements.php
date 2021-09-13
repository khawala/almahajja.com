<?php

use Illuminate\Database\Seeder;
use App\Advertisement;

class advertisements extends Seeder
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

        $status = array_keys(config('variables.advertisements_status'));
        
        for ($i = 1; $i <= 10 ; $i++) {
            array_push($data, [
                'name'              => $faker->sentence,
                'short_description' => $faker->realText(),
                'description'       => $faker->realText(),
                'status'       => $faker->randomElement($status),
            ]);
        }
        
        Advertisement::insert($data);
    }
}
