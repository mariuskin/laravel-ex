<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RunsTableSeeder extends Seeder
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
        DB::table('runs')->insert([
            'year' => intval($faker->year($max = 'now')),
            'first_quarter' => $faker->randomFloat($nbMaxDecimals = 2, $min = 500, $max = 3000),
            'second_quarter' => $faker->randomFloat($nbMaxDecimals = 2, $min = 500, $max = 3000),
            'third_quarter' => $faker->randomFloat($nbMaxDecimals = 2, $min = 500, $max = 3000),
            'fourth_quarter' => $faker->randomFloat($nbMaxDecimals = 2, $min = 500, $max = 3000),
            'car_id' => $faker->numberBetween($min = 1, $max = 20),
        
        ]);
        }
    }
}
