<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->string('customer_name',50)->nullable();
            $table->string('customer_phone',20)->unique();
            $table->string('customer_email',20)->nullable();
            $table->string('customer_address',200)->nullable();
            $table->integer('customer_publish')->default(1);
            $table->integer('customer_creator')->nullable();
            $table->integer('customer_editor')->nullable();
            $table->string('customer_slug',40)->nullable();
            $table->integer('customer_status')->default(1);
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
        Schema::dropIfExists('customers');
    }
}
