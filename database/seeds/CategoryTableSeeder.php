<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'category_name' => 'Food and Beverages',
                'category_type' => '',
                'is_active' => true,
                'created_at' => \Carbon\Carbon::now(),
            ],
            [
                'category_name' => 'Events and Weddings',
                'category_type' => '',
                'is_active' => true,
                'created_at' => \Carbon\Carbon::now(),
            ], [
                'category_name' => 'Gifts and Flowers',
                'category_type' => '',
                'is_active' => true,
                'created_at' => \Carbon\Carbon::now(),
            ], [
                'category_name' => 'Beauty and Fragrance',
                'category_type' => '',
                'is_active' => true,
                'created_at' => \Carbon\Carbon::now(),
            ], [
                'category_name' => 'Fashion & Wears',
                'category_type' => '',
                'is_active' => true,
                'created_at' => \Carbon\Carbon::now(),
            ], [
                'category_name' => 'Health and Care',
                'category_type' => '',
                'is_active' => true,
                'created_at' => \Carbon\Carbon::now(),
            ], [
                'category_name' => 'Home and Garden',
                'category_type' => '',
                'is_active' => true,
                'created_at' => \Carbon\Carbon::now(),
            ], [
                'category_name' => 'Tourism & Holidays',
                'category_type' => '',
                'is_active' => true,
                'created_at' => \Carbon\Carbon::now(),
            ], [
                'category_name' => 'Car and Automotive',
                'category_type' => '',
                'is_active' => true,
                'created_at' => \Carbon\Carbon::now(),
            ], [
                'category_name' => 'Electronics & Electricals',
                'category_type' => '',
                'is_active' => true,
                'created_at' => \Carbon\Carbon::now(),
            ], [
                'category_name' => 'Supplies & Support',
                'category_type' => '',
                'is_active' => true,
                'created_at' => \Carbon\Carbon::now(),
            ], [
                'category_name' => 'Consult and Contracting',
                'category_type' => '',
                'is_active' => true,
                'created_at' => \Carbon\Carbon::now(),
            ], [
                'category_name' => 'Training and Education',
                'category_type' => '',
                'is_active' => true,
                'created_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
