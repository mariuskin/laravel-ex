<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class OwnersTableSeeder extends Seeder
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
        DB::table('owners')->insert([
            'first_name' => $faker->firstName($gender = null|'male'|'female'),
            'last_name' => $faker->lastName(),
            'email' => $faker->email(),
            'contact_link' => $faker->url(),
            'section_id'=> $i + 1,

        ]);
    	}
    }
}
