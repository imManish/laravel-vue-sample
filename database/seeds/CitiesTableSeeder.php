<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('cities')->delete();
        $cities = array(
            array('name' => 'Ahmedabad', 'country_id' => 2),
            array('name' => 'Surat', 'country_id' => 2),
            array('name' => 'Gandhi Nagar', 'country_id' => 2),

            array('name' => 'Indore', 'country_id' => 2),
            array('name' => 'Bhopal', 'country_id' => 2),
            array('name' => 'Gwalior', 'country_id' => 2),

            array('name' => 'Mumbai', 'country_id' => 2),
            array('name' => 'Pune', 'country_id' => 2),
            array('name' => 'Delhi', 'country_id' => 2),

            array('name' => 'Dubai', 'country_id' => 1),
            array('name' => 'Abu Dhabi', 'country_id' => 1),
            array('name' => 'Sharjah', 'country_id' => 1),
            array('name' => 'Al Ain', 'country_id' => 1),
            array('name' => 'Ajman', 'country_id' => 1),
            array('name' => 'Ras Al Khaimah', 'country_id' => 1),
        );
        DB::table('cities')->insert($cities);
    }
}
