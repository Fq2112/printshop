<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('payment_id');
            $table->foreign('payment_id')->references('id')->on('payment_carts')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('title');
            $table->string('subtitle');
            $table->dateTime('time_detail');
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
        Schema::dropIfExists('tracking_logs');
    }
}
