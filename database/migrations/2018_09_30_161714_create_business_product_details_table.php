<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('business_product_details', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('business_detail_id')->unsigned();
            $table->foreign('business_detail_id')->references('id')->on('business_details')->onDelete('cascade');

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->enum('product_service_type', ['service', 'product', 'other'])->default('other');

            $table->double('product_price', 8, 2)->unsigned()->nullable()->default(0);
            $table->double('product_discount', 8, 2)->unsigned()->nullable()->default(0);

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
        Schema::dropIfExists('business_product_details');
    }
}
