<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceTiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_tiers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('unit_id')->references('id')
                ->on('units')->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->integer('start');
            $table->integer('end');
            $table->decimal('discount',6,2);
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
        Schema::dropIfExists('price_tiers');
    }
}
