<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TechnicalInspectionsTableSeeder extends Seeder
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

        	$str1=$faker->dateTimeThisDecade($max = 'now')->format('Y-m-d H:i:s');
        	$str2=$faker->dateTimeThisDecade($max = 'now')->format('Y-m-d H:i:s');

	        DB::table('technical_inspections')->insert([
	            'recent_check' => $faker->dateTimeThisMonth($max = 'now'),
	            'dates' => "$str1, $str2, ",
                'owner_id' => $faker->numberBetween($min = 1, $max = 20),
                'car_id' => $i + 1,
	        ]);
    	
    	}
    }
}
