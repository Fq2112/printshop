<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->unsignedBigInteger('subkategori_id')->nullable();
            $table->foreign('subkategori_id')->references('id')->on('sub_kategoris')
                ->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->unsignedBigInteger('cluster_id')->nullable();
            $table->foreign('cluster_id')->references('id')->on('cluster_kategoris')
                ->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses')
                ->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->integer('material_id')->nullable();
            $table->integer('type_id')->nullable();
            $table->integer('balance_id')->nullable();
            $table->integer('page_id')->nullable();
            $table->integer('copies_id')->nullable();
            $table->integer('size_id')->nullable();
            $table->string('width')->nullable();
            $table->string('length')->nullable();
            $table->integer('lamination_id')->nullable();
            $table->integer('side_id')->nullable();
            $table->integer('edge_id')->nullable();
            $table->integer('color_id')->nullable();
            $table->integer('finishing_id')->nullable();
            $table->integer('folding_id')->nullable();
            $table->integer('front_side_id')->nullable();
            $table->integer('right_side_id')->nullable();
            $table->integer('left_side_id')->nullable();
            $table->integer('back_side_id')->nullable();
            $table->integer('front_cover_id')->nullable();
            $table->integer('back_cover_id')->nullable();
            $table->integer('binding_id')->nullable();
            $table->integer('print_method_id')->nullable();
            $table->integer('material_cover_id')->nullable();
            $table->integer('side_cover_id')->nullable();
            $table->integer('cover_lamination_id')->nullable();
            $table->integer('lid_id')->nullable();
            $table->integer('orientation_id')->nullable();
            $table->integer('extra_id')->nullable();
            $table->integer('holder_id')->nullable();
            $table->integer('material_color_id')->nullable();

            $table->integer('qty');
            $table->string('price_pcs');
            $table->date('production_finished');
            $table->string('ongkir');
            $table->string('delivery_duration');
            $table->date('received_date');
            $table->string('total');
            $table->text('file')->nullable();
            $table->text('link')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('carts');
    }
}
