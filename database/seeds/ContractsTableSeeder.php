<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ContractsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 20; $i++){

            $faker = Faker::create();


        	$start_date_min = date('Y-m-d H:i:s', strtotime("2011-01-07"));
            $start_date_max = date('Y-m-d H:i:s', strtotime("2013-01-07"));
            $end_date_min = date('Y-m-d H:i:s', strtotime("2013-01-07"));
            $end_date_max = date('Y-m-d H:i:s', strtotime("2016-01-07"));
            
        	// Convert to timetamps
		    $start_min = strtotime($start_date_min);
            $start_max = strtotime($start_date_max);
            
            $end_min = strtotime($end_date_min);
            $end_max = strtotime($end_date_max);



		    // Generate random number using above bounds
		    $val_start = rand($start_min, $start_max);
            $val_end = rand($end_min, $end_max);

       		 DB::table('contracts')->insert([
            'contract_number' => $faker->bothify('??-###'),
            'start_date' => date('Y-m-d H:i:s', $val_start),
            'end_date' => date('Y-m-d H:i:s', $val_end),
            'file' => str_random(10),
            'owner_id' => $i + 1,

        ]);
    	}
    }
}
