<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldTypeIdInDetailProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_products', function (Blueprint $table) {
            $table->unsignedBigInteger('type_tier_id')->nullable();
            $table->foreign('type_tier_id')->references('id')
                ->on('type_tiers')->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_products', function (Blueprint $table) {
            //
        });
    }
}
