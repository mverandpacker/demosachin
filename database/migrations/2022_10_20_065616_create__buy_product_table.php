<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_buy_product', function (Blueprint $table) {
            $table->id();
            $table->string('Customer_id');
            $table->string('Product_id');
            $table->string('Date');
            $table->string('Total_price');
            $table->string('Customer_receive');
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
        Schema::dropIfExists('_buy_product');
    }
}
