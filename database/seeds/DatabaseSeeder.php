<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
             UserRolesSeeder::class,
             PaymentTableSeeder::class,
             CategoryTableSeeder::class,
             ProductTableSeeder::class,
             CountriesTableSeeder::class,
             //StatesTableSeeder::class,
             CitiesTableSeeder::class,
            ]);
    }
}
