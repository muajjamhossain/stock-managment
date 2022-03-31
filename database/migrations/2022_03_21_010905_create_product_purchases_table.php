<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_purchases', function (Blueprint $table) {
            $table->bigIncrements('purchase_id');
            $table->integer('product_id')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->string('purchase_price',10)->nullable();
            $table->string('purchase_quantity',5)->nullable();
            $table->string('purchase_total_price',10)->nullable();
            $table->string('purchase_invoice',20)->nullable();
            $table->string('purchase_remarks',200)->nullable();
            $table->integer('purchase_creator')->nullable();
            $table->integer('purchase_editor')->nullable();
            $table->string('purchase_slug',40)->nullable();
            $table->integer('purchase_status')->default(1);
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
        Schema::dropIfExists('product_purchases');
    }
}
