<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClusterKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cluster_kategoris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('subkategori_id');
            $table->foreign('subkategori_id')->references('id')
                ->on('sub_kategoris')->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->string('name');
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
        Schema::dropIfExists('cluster_kategoris');
    }
}
