<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->integer('prodcate_id')->nullable();
            $table->string('product_name',50);
            $table->text('product_remarks')->nullable();
            $table->integer('product_publish')->default(1);
            $table->integer('product_creator')->nullable();
            $table->integer('product_editor')->nullable();
            $table->string('product_slug',50)->nullable();
            $table->integer('product_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}