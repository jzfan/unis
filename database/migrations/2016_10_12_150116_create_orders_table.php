<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('billing_id')->nullable();
            $table->string('type');
            $table->string('order_no');
            $table->string('subject');
            $table->integer('user_id')->unsigned();
            $table->integer('deliver_id')->unsigned()->nullable();
            $table->integer('total');
            $table->string('address');
            $table->enum('status', ['ordered', 'canceled', 'paid', 'paid_fail', 'delivered', 'drawed'])->default('ordered');
            $table->timestamp('payed_at');
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
