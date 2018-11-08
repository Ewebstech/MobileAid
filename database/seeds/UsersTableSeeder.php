<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's clear the users table first
        User::truncate();

        $faker = \Faker\Factory::create();

        $password = Hash::make('password'); 

        User::create([
                'firstname' => $faker->firstname,
                'lastname' => $faker->lastname,
                'phonenumber' => $faker->unique()->phonenumber,
                'email' => 'admin@admin.com', 
                'role' => 'admin',
                'content' => 'null', 
                'avatar' =>  $faker->imageUrl,
                'client_id' =>rand(),
                'remember_token' => str_random(10),
                'password' => $password
       ]);

        for($i = 0; $i <= 3; $i++){
            User::create([
                    'firstname' => $faker->firstname,
                    'lastname' => $faker->lastname,
                    'phonenumber' => $faker->unique()->phonenumber,
                    'email' => $faker->unique()->safeEmail, 
                    'role' => 'member',
                    'content' => 'null',
                    'avatar' =>  $faker->imageUrl,
                    'client_id' =>rand(),
                    'remember_token' => str_random(10),
                    'password' => $password
            ]);
        }
        
    }
}
