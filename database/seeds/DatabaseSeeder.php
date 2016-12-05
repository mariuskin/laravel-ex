<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(OwnersTableSeeder::class);
        $this->call(ContractsTableSeeder::class);
        $this->call(OwnershipsTableSeeder::class);
        $this->call(ActsTableSeeder::class);
        $this->call(TechnicalInspectionsTableSeeder::class);
        $this->call(RunsTableSeeder::class);
        $this->call(CarsTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(SectionsTableSeeder::class);

    }
}
