<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_name');
            $table->bigInteger('user_id')->unsigned(); //MySQLで整数カラムを符号なしに設定
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('category_id');
            $table->integer('category_child_id');
            $table->string('brand_name')->nullable();
            $table->longText('description');
            $table->string('price');
            $table->string('size')->nullable();
            $table->string('condition');
            $table->string('shipping_fee_payer');
            $table->integer('prefecture_id');
            $table->string('shipping_days');
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            //timestamps ()関数は、作成した両方のカラムに対してデフォルト値00 - 00 00 00 00を行います
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
