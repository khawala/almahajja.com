<?php

use Illuminate\Database\Seeder;
use App\DivisionTime;
use App\Section;

class division_times extends Seeder
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
        $sections = Section::pluck('id')->toArray();
        
        for ($i = 1; $i <= 50 ; $i++) {
            array_push($data, [
                'section_id' => $faker->randomElement($sections),
                'description' => $faker->realText(),
                'start_date'  => $faker->date(),
                'end_date'    => $faker->date(),
            ]);
        }
        
        DivisionTime::insert($data);
    }
}
