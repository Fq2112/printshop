<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cluster_kategoris_id');
            $table->foreign('cluster_kategoris_id')->references('id')
                ->on('cluster_kategoris')->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->boolean('is_material')->default(false);
            $table->string('material_ids')->nullable();

            $table->boolean('is_type')->default(false);
            $table->string('type_ids')->nullable();

            $table->boolean('is_balance')->default(false);
            $table->string('balance_ids')->nullable();

            $table->boolean('is_page')->default(false);
            $table->string('page_ids')->nullable();

            $table->boolean('is_copies')->default(false);
            $table->string('copies_ids')->nullable();

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

            $table->boolean('is_finishing')->default(false);
            $table->string('finishing_ids')->nullable();

            $table->boolean('is_folding')->default(false);
            $table->string('folding_ids')->nullable();

            $table->boolean('is_front_side')->default(false);
            $table->string('front_side_ids')->nullable();

            $table->boolean('is_right_side')->default(false);
            $table->string('right_side_ids')->nullable();

            $table->boolean('is_left_side')->default(false);
            $table->string('left_side_ids')->nullable();

            $table->boolean('is_back_side')->default(false);
            $table->string('back_side_ids')->nullable();

            $table->boolean('is_front_cover')->default(false);
            $table->string('front_cover_ids')->nullable();

            $table->boolean('is_back_cover')->default(false);
            $table->string('back_cover_ids')->nullable();

            $table->boolean('is_binding')->default(false);
            $table->string('binding_ids')->nullable();

            $table->boolean('is_print_method')->default(false);
            $table->string('print_method_ids')->nullable();

            $table->boolean('is_design')->default(false);
            $table->boolean('is_landscape')->default(false); //Default Potrait
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
        Schema::dropIfExists('detail_products');
    }
}
