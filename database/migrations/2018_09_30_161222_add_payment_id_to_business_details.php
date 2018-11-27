<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class AddPaymentIdToBusinessDetails extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('business_details', function ($table) {
            $table->integer('payment_id');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('business_details', function ($table) {
            $table->dropColumn('payment_id');
        });
    }
}
