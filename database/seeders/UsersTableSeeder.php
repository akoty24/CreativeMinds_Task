<?php

namespace Database\Seeders;

use DB;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'mobile_number' => $faker->unique()->phoneNumber,
                'password' => Hash::make('password'), 
                'verification_code' => null, 
                'username' => $faker->userName,
                'location' => $faker->address,
                'image' => null, 
                'email_verified_at' => null, 
                'role' => $faker->randomElement(['user', 'delivery']), 
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
