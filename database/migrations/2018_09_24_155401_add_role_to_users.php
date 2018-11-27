<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class AddRoleToUsers extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            //$table->string('username');
            $table->integer('role_id')->unsigned()->default(5);
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

            $table->string('first_name')->unsigned()->nullable();
            $table->string('last_name')->unsigned()->nullable();

            $table->string('address')->unsigned()->nullable();
            $table->string('mobile_number')->unique();
            $table->string('full_name');

            $table->decimal('lat', 10, 5)->unsigned()->nullable();
            $table->decimal('long', 10, 5)->unsigned()->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->default('male');
            $table->string('country')->unsigned()->nullable();

            $table->enum('vehicle_type', ['Bicycle', 'Bike', 'Car', 'Other'])->default('Other');

            $table->string('state')->unsigned()->nullable();
            $table->string('city')->unsigned()->nullable();
            $table->integer('social_id')->default(1);

            $table->boolean('is_verified')->default(0);
            $table->boolean('is_active')->default(0);
            $table->boolean('is_admin')->default(0);
        });
    }

    /**
     * @param delete all migration
     *
     * @method down
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('role_id');

            $table->dropColumn('full_name');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');

            $table->dropColumn('mobile_number');

            $table->dropColumn('address');

            $table->dropColumn('lat');
            $table->dropColumn('long');

            $table->dropColumn('gender');

            $table->dropColumn('country');
            $table->dropColumn('state');
            $table->dropColumn('city');

            $table->dropColumn('vehicle_type');

            $table->dropColumn('social_id');
            $table->dropColumn('is_verified');

            $table->dropColumn('is_active');
            $table->dropColumn('is_admin');
        });
    }
}
