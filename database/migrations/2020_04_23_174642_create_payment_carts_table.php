<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->text('cart_ids');
            $table->unsignedBigInteger('shipping_address');
            $table->foreign('shipping_address')->references('id')->on('addresses')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedBigInteger('billing_address');
            $table->foreign('billing_address')->references('id')->on('addresses')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->date('production_finished');
            $table->string('ongkir');
            $table->string('delivery_duration');
            $table->date('received_date');
            $table->string('price_total');
            $table->text('uni_code_payment');
            $table->string('token')->unique();
            $table->integer('rate_id');
            $table->boolean('finish_payment')->default(false);
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
        Schema::dropIfExists('payment_carts');
    }
}
