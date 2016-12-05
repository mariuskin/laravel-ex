<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CarsTableSeeder extends Seeder
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

	        DB::table('cars')->insert([
	            'brand_model' => $faker->lexify('???? ??????'),
	            'state_number' => $faker->bothify('???-###'),
	        	'fabrication_year' => intval($faker->year($max = 'now')),
	            'oil_type' => $faker->randomElement($array = ['DIESEL', 'GASOLINE', 'GAS']),
	            'gps' => $faker->randomElement($array = ['AVAILABLE', 'UNAVAILABLE']),
                'owner_id' => $faker->numberBetween($min = 1, $max = 20),
	        ]);
    	
    	}
            
    }
}
