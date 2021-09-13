<?php

use Illuminate\Database\Seeder;
use App\Classroom;

class classrooms extends Seeder
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
        $users = App\User::pluck('id')->toArray();
        $sections = App\Section::pluck('id')->toArray();
        
        for ($i = 1; $i <= 30 ; $i++) {
            array_push($data, [
                'name' => $faker->name,
                'teacher_id' => $faker->randomElement($users),
                'section_id' => $faker->randomElement($sections),
                
            ]);
        }
        
        Classroom::insert($data);
    }
}
