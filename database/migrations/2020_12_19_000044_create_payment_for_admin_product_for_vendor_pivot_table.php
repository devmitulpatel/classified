<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentForAdminProductForVendorPivotTable extends Migration
{
    public function up()
    {
        Schema::create('payment_for_admin_product_for_vendor', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_for_admin_id');
            $table->foreign('payment_for_admin_id', 'payment_for_admin_id_fk_2823030')->references('id')->on('payment_for_admins')->onDelete('cascade');
            $table->unsignedBigInteger('product_for_vendor_id');
            $table->foreign('product_for_vendor_id', 'product_for_vendor_id_fk_2823030')->references('id')->on('product_for_vendors')->onDelete('cascade');
        });
    }
}
