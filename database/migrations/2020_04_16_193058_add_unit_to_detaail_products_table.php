<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUnitToDetaailProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_products', function (Blueprint $table) {
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')
                ->on('units')->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->string('price')->default('25000');
            $table->string('weight')->default('1000');// in Gram
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
            $table->dropColumn('unit_id');
            $table->dropForeign('unit_id');
        });
    }
}
