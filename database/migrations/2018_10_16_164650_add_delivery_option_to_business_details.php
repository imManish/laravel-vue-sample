<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class AddDeliveryOptionToBusinessDetails extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('business_details', function ($table) {
            $table->boolean('business_delivery_option')->unsigned()->default(0)->after('business_city');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('business_details', function ($table) {
            $table->dropColumn('business_delivery_option');
        });
    }
}
