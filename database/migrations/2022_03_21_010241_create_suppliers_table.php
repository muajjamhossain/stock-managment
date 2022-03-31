<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('supplier_id');
            $table->string('supplier_name',50)->nullable();
            $table->string('supplier_phone',20)->unique();
            $table->string('supplier_email',20)->nullable();
            $table->string('supplier_address',200)->nullable();
            $table->integer('supplier_publish')->default(1);
            $table->integer('supplier_creator')->nullable();
            $table->integer('supplier_editor')->nullable();
            $table->string('supplier_slug',40)->nullable();
            $table->integer('supplier_status')->default(1);
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
        Schema::dropIfExists('suppliers');
    }
}
