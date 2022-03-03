<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentzTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentz', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id');
            $table->string('ship_name')->nullable();
            $table->string('ship_phone')->nullable();
            $table->string('ship_email')->nullable();
            $table->string('ship_address')->nullable();
            $table->string('ship_city')->nullable();
            $table->string('ship_city1')->nullable();
            $table->string('ship_zip')->nullable();
            $table->integer('price');
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
        Schema::dropIfExists('paymentz');
    }
}
