<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_add_vendor', function (Blueprint $table) {
            $table->id();
            $table->string('Vendor_name');
            $table->string('Shop_name');
            $table->string('Vendor_email');
            $table->string('Vendor_number');
            $table->text('Vendor_address');
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
        Schema::dropIfExists('_add_vendor');
    }
}
