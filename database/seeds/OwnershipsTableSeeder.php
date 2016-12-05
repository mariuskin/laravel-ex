<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OwnershipsTableSeeder extends Seeder
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

            DB::table('ownerships')->insert([
                'type_of_ownership' => $faker->randomElement($array = ['RENT', 'OWN']),
                'car_id' => $i + 1,
            ]);
            

        }
    	
    }
}
