<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('payment_carts_id');
            $table->foreign('payment_carts_id')->references('id')->on('payment_carts')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('progress_status');
            $table->string('uni_code')->unique();
            $table->dateTime('date_production')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
