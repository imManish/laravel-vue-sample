<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('countries')->delete();
        $countries = array(
            array('id' => 1, 'code' => 'UAE', 'name' => 'United Arab Emirates', 'phonecode' => 971,
            'url' => 'https://s3-us-west-2.amazonaws.com/wasel-bucket/flags/ae.png', ),
            array('id' => 2, 'code' => 'IND', 'name' => 'India', 'phonecode' => 91,
            'url' => 'https://s3-us-west-2.amazonaws.com/wasel-bucket/flags/in.png', ),
            array('id' => 3, 'code' => 'PAK', 'name' => 'Pakistan', 'phonecode' => 92,
            'url' => ' https://s3-us-west-2.amazonaws.com/wasel-bucket/flags/pk.png', ),
            array('id' => 4, 'code' => 'SA', 'name' => 'Saudi Arabia', 'phonecode' => 966,
            'url' => 'https://s3-us-west-2.amazonaws.com/wasel-bucket/flags/sa.png', ),
            );
        DB::table('countries')->insert($countries);
    }
}
