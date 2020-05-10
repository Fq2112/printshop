<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fronts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->string('price')->default('10000');
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
        Schema::dropIfExists('fronts');
    }
}
