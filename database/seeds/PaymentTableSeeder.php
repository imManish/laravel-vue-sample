<?php

use Illuminate\Database\Seeder;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('payments')->insert([
            [
                'payment_method_name' => 'Cash On Delivery',
                'payment_method_alias' => 'cash_on_delivery',
                'payment_mode' => 'COD',
                'is_active' => true,
                'created_at' => \Carbon\Carbon::now(),
            ],
            [
                'payment_method_name' => 'Paypal',
                'payment_method_alias' => 'paypal',
                'payment_mode' => 'Paypal',
                'is_active' => true,
                'created_at' => \Carbon\Carbon::now(),
            ], [
                'payment_method_name' => 'Credit Card',
                'payment_method_alias' => 'credit_card',
                'payment_mode' => 'Credit',
                'is_active' => true,
                'created_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
