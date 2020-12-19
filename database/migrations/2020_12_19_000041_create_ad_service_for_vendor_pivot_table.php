<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdServiceForVendorPivotTable extends Migration
{
    public function up()
    {
        Schema::create('ad_service_for_vendor', function (Blueprint $table) {
            $table->unsignedBigInteger('ad_id');
            $table->foreign('ad_id', 'ad_id_fk_2716180')->references('id')->on('ads')->onDelete('cascade');
            $table->unsignedBigInteger('service_for_vendor_id');
            $table->foreign('service_for_vendor_id', 'service_for_vendor_id_fk_2716180')->references('id')->on('service_for_vendors')->onDelete('cascade');
        });
    }
}
