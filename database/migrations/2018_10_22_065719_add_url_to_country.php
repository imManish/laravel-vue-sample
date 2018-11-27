<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class AddUrlToCountry extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // add new column to country
        Schema::table('countries', function ($table) {
            $table->string('url')->unsigned()->nullable()->after('phonecode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        //schema delete
        Schema::table('countries', function ($table) {
            $table->dropColumn('url');
        });
    }
}
