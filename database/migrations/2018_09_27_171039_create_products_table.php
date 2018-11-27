<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->string('product')->unsigned()->nullable();
            $table->string('product_alias')->unsigned()->nullable();

            $table->string('product_unit')->unsigned()->nullable();
            $table->string('product_style')->unsigned()->nullable();

            $table->boolean('is_service')->default(0);
            $table->boolean('is_home_service')->default(0);

            $table->string('home_service_text')->unsigned()->nullable();

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
        Schema::dropIfExists('products');
    }
}
