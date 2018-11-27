<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessDetailsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('business_details', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('business_logo')->unsigned()->nullable();
            $table->string('business_name')->unsigned()->unique();

            $table->string('business_style')->unsigned()->nullable();
            $table->string('business_contact_number')->unsigned()->nullable();
            $table->string('business_email')->unsigned()->nullable();

            $table->string('business_hash_number')->unsigned()->unique();

            $table->string('business_latitude')->unsigned()->nullable();
            $table->string('business_longitude')->unsigned()->nullable();

            $table->string('business_address')->unsigned()->nullable();
            $table->string('business_country')->unsigned()->nullable();
            $table->string('business_state')->unsigned()->nullable();
            $table->string('business_city')->unsigned()->nullable();

            $table->boolean('return_policy')->unsigned()->default(0);

            $table->string('return_days')->unsigned()->nullable()->default(0);
            $table->text('return_policy_note')->unsigned()->nullable();

            $table->boolean('minium_order')->unsigned()->default(0);
            $table->integer('number_of_minimum')->unsigned()->default(0);

            $table->integer('number_of_views')->unsigned()->default(0);

            $table->dateTime('business_registration_date');

            $table->boolean('is_active')->default(1);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('business_details');
    }
}
