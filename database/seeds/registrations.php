<?php

use Illuminate\Database\Seeder;
use App\Registration;

class registrations extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        $data       = [];
        $users      = App\User::students()->pluck('id')->toArray();
        $sections   = App\Section::pluck('id')->toArray();
        $telecoms   = App\Telecom::pluck('id')->toArray();
        $periods    = App\Period::pluck('id')->toArray();
        $activities = App\Activity::pluck('id')->toArray();
        $classrooms = App\Classroom::pluck('id')->toArray();

        for ($i = 1; $i <= 5 ; $i++) {
            array_push($data, [
                'user_id'      => $faker->randomElement($users),
                'section_id'   => $faker->randomElement($sections),
                'telecom_id'   => $faker->randomElement($telecoms),
                'period_id'    => $faker->randomElement($periods),
                'activity_id'  => $faker->randomElement($activities),
                'classroom_id' => $faker->randomElement($classrooms),
                'status'       => $faker->boolean(),
                'created_by'   => $faker->randomElement($users),
                'updated_by'   => $faker->randomElement($users),
            ]);
        }
        
        Registration::insert($data);
    }
}
