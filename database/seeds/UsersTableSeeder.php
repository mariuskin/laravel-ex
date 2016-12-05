<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        for($i = 0; $i < 20; $i++){
        DB::table('users')->insert([
            'name' => $faker->firstName($gender = null|'male'|'female'),
            'email' => $faker->email,
            'password' => bcrypt('secret'),
            'user_type' => $faker->randomElement($array = ['SUPER_ADMIN', 'ADMIN', 'USER']),
            'lang' => $faker->randomElement($array = ['en', 'lt']),
        ]);
    	}

        DB::table('users')->insert([
            'name' => 'marius',
            'email' => 'marius.kinder'.'@gmail.com',
            'password' => bcrypt('tumano'),
            'user_type' => $faker->randomElement($array = ['SUPER_ADMIN']),
            'lang' => $faker->randomElement($array = ['en']),
        ]);

        DB::table('users')->insert([
            'name' => 'marius',
            'email' => 'marius.kinderis'.'@hotmail.fr',
            'password' => bcrypt('m'),
            'user_type' => $faker->randomElement($array = ['USER']),
            'lang' => $faker->randomElement($array = ['lt']),
        ]);
    }
}
