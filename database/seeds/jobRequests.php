<?php

use Illuminate\Database\Seeder;
use App\JobRequest;
use App\Job;
use App\Nationality;

class jobRequests extends Seeder
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

        $jobs = Job::pluck('id')->toArray();
        $jobs_status = array_keys(config('variables.jobs_status'));
        $nationalities = Nationality::pluck('id')->toArray();
        
        for ($i = 1; $i <= 100 ; $i++) {
            array_push($data, [
                'job_id' => $faker->randomElement($jobs),
                'name' => $faker->sentence(),
                'mobile' => $faker->e164PhoneNumber(),
                'nationality_id' => $faker->randomElement($nationalities),
                'cv_description' => $faker->realText(1000),
                'status' => $faker->randomElement($jobs_status),
            ]);
        }
        
        JobRequest::insert($data);
    }
}
