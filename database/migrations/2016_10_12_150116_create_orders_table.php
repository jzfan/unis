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
            $table->string('order_no');
            $table->string('billing_id')->nullable();
            $table->string('type');
            $table->string('subject');
            $table->integer('user_id')->unsigned();
            $table->integer('deliver_id')->unsigned()->nullable();
            $table->integer('total');
            $table->integer('school_id');
            $table->integer('campus_id');
            $table->integer('dorm_id');
            $table->string('address');
            $table->string('mark')->nullable();
            $table->enum('status', ['ordered', 'paid', 'paid_fail', 'taken', 'received', 'delivered', 'withdrawed'])->default('ordered');
            $table->timestamp('appointment_at')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('taken_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('received_at')->nullable();
            $table->timestamp('withdrawed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

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
