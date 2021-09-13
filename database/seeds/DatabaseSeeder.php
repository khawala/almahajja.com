<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(nationalities::class);
        $this->call(users::class);
        $this->call(configurations::class);

        if (env('PC', false)) {
            // FAKE
            $this->call(advertisements::class);
            $this->call(jobs::class);
            $this->call(jobRequests::class);
            $this->call(activities::class);
            $this->call(divisions::class);
            $this->call(sections::class);
            $this->call(telecoms::class);
            $this->call(periods::class);
            $this->call(division_times::class);
            $this->call(classrooms::class);
            $this->call(registrations::class);
        }
    }
}
