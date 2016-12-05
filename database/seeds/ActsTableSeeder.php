<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ActsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i =0; $i < 20; $i++){

	        DB::table('acts')->insert([
	            'status' => $faker->randomElement($array = ['AVAILABLE', 'UNAVAILABLE']),
	            'file' => $faker->imageUrl($width = 640, $height = 480),
                'owner_id' => $faker->numberBetween($min = 1, $max = 20),
                
	        ]);
    	
    	}
    }
}
