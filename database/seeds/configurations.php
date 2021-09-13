<?php

use App\Configuration;
use Illuminate\Database\Seeder;

class configurations extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        Configuration::truncate();
        
        $data = [];
        
        for($i = 1; $i <= 1 ; $i++) {
            array_push($data, [
                'mobile' => '',
                'email' => $faker->email,
            ]);
        }
        
        Configuration::insert($data);
    }
}
