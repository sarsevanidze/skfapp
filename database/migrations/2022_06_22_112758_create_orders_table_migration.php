<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTableMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id');
            $table->string('status');
            $table->dateTime('date_created');
            $table->dateTime('date_modified');
            $table->string('discount_total');
            $table->string('discount_tax');
            $table->string('shipping_total');
            $table->string('shipping_tax');
            $table->string('cart_tax');
            $table->string('total');
            $table->string('total_tax');
            $table->string('user_email');
            $table->string('payment_method');
            $table->dateTime('date_paid');
            $table->dateTime('date_completed')->nullable();
            $table->integer('refund_id');
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
        Schema::dropIfExists('orders');
    }
}
