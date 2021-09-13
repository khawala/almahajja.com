<?php

use Illuminate\Database\Seeder;
use App\Section;
use App\Division;
use App\User;

class sections extends Seeder
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

        $divisions = Division::pluck('id')->toArray();
        $users     = User::supervisor()->pluck('id')->toArray();
        
        for ($i = 1; $i <= 10 ; $i++) {
            array_push($data, [
                'name' => $faker->sentence(),
                'description' => $faker->realText(),
                'division_id' => $faker->randomElement($divisions),
                'supervisor_id' => $faker->randomElement($users),
            ]);
        }
        
        Section::insert($data);
    }
}
