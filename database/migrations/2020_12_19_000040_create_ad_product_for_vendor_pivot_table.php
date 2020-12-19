<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdProductForVendorPivotTable extends Migration
{
    public function up()
    {
        Schema::create('ad_product_for_vendor', function (Blueprint $table) {
            $table->unsignedBigInteger('ad_id');
            $table->foreign('ad_id', 'ad_id_fk_2716179')->references('id')->on('ads')->onDelete('cascade');
            $table->unsignedBigInteger('product_for_vendor_id');
            $table->foreign('product_for_vendor_id', 'product_for_vendor_id_fk_2716179')->references('id')->on('product_for_vendors')->onDelete('cascade');
        });
    }
}
