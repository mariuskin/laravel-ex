<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i =0; $i < 20; $i++){

    	   $faker = Faker::create();

            DB::table('departments')->insert([
                'name' => $faker->word,
                'description' => $faker->text($maxNbChars = 200),
            ]);
            

        }
    }
}
