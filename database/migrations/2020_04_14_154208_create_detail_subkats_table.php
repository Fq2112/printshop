<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSubkatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_subkats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('subkategori_id');
            $table->foreign('subkategori_id')->references('id')
                ->on('sub_kategoris')->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->boolean('is_material')->default(false);
            $table->string('material_ids')->nullable();
            $table->boolean('is_size')->default(false);
            $table->string('size_ids')->nullable();
            $table->boolean('is_lamination')->default(false);
            $table->string('lamination_ids')->nullable();
            $table->boolean('is_side')->default(false);
            $table->string('side_ids')->nullable();
            $table->boolean('is_edge')->default(false);
            $table->string('edge_ids')->nullable();
            $table->boolean('is_color')->default(false);
            $table->string('color_ids')->nullable();
            $table->boolean('is_folding')->default(false);
            $table->string('folding_ids')->nullable();
            $table->boolean('is_front')->default(false);
            $table->string('front_ids')->nullable();
            $table->boolean('is_right_side')->default(false);
            $table->string('right_side_ids')->nullable();
            $table->boolean('is_left_side')->default(false);
            $table->string('right_left_ids')->nullable();
            $table->boolean('is_back_side')->default(false);
            $table->string('back_side_ids')->nullable();
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
        Schema::dropIfExists('detail_subkats');
    }
}
