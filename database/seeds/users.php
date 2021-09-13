<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use App\Nationality;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        // Create users almahajja
        $user = User::create([
            'name'        => 'almahajja',
            'username'    => 'almahajja',
            'email'       => 'almahajja@gmail.com',
            'password'    => '123456',
            'status'      => 1,
            'national_id' => $faker->numberBetween(1000000, 10000000),
            'gender'      => $faker->boolean(),
            'created_at'  => $faker->dateTime(),
            'role'        => 20,
        ]);

        $faker = Faker\Factory::create();
        $nationalities = Nationality::pluck('id')->toArray();

        for ($i = 1; $i <= 12 ; $i++) {
            $user = User::create([
                'name'           => 'admin' . $i,
                'username'       => 'admin' . $i,
                'email'          => $faker->email,
                'password'       => '123456',
                'status'         => 1,
                'national_id'    => $faker->numberBetween(1000000, 10000000),
                'gender'         => $faker->boolean(),
                'nationality_id' => $faker->randomElement($nationalities),
                'created_at'     => $faker->dateTime(),
                'role'           => $faker->randomElement([0, 5, 10, 20]),
            ]);
        }
    }
}
