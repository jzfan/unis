<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            $table->string('name');
            $table->string('img');
            $table->string('type')->default('');
            $table->string('description')->default('');
            $table->integer('price');
            $table->integer('discount')->default(0);
            $table->integer('sold')->default(0);
            // $table->integer('favorite')->unsigned()->default(0);
            // $table->integer('recommend')->unsigned()->default(0);
            $table->enum('status', [0, 1])->default(0);
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
        Schema::dropIfExists('foods');
    }
}
