<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuckyMoneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lucky_moneys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('billing_id');
            $table->integer('user_id')->unsigned();
            $table->string('openid');
            $table->integer('total_num')->default(1);
            $table->integer('total_amount');
            $table->string('wishing')->nullable();
            $table->string('client_ip')->nullable();
            $table->string('act_name');
            $table->string('remark');
            $table->enum('status', ['received', 'waiting']);
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
        Schema::dropIfExists('lucky_moneys');
    }
}
