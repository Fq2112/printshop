<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGallerySubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_subs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('subkategori_id')->nullable();
            $table->foreign('subkategori_id')->references('id')->on('sub_kategoris')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->text('image');
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
        Schema::dropIfExists('gallery_subs');
    }
}
