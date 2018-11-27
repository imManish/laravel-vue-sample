<?php

use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'role_name' => 'Driver',
                'role_alias' => 'driver',
                'is_active' => true,
                'created_at' => \Carbon\Carbon::now(),
            ],
            [
                'role_name' => 'Business',
                'role_alias' => 'business',
                'is_active' => true,
                'created_at' => \Carbon\Carbon::now(),
            ],
            [
                'role_name' => 'Provider',
                'role_alias' => 'provider',
                'is_active' => true,
                'created_at' => \Carbon\Carbon::now(),
            ],
            [
                'role_name' => 'Admin',
                'role_alias' => 'admin',
                'is_active' => true,
                'created_at' => \Carbon\Carbon::now(),
            ],
            [
                'role_name' => 'User',
                'role_alias' => 'user',
                'is_active' => true,
                'created_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
