<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackForAdminProductForVendorPivotTable extends Migration
{
    public function up()
    {
        Schema::create('feedback_for_admin_product_for_vendor', function (Blueprint $table) {
            $table->unsignedBigInteger('feedback_for_admin_id');
            $table->foreign('feedback_for_admin_id', 'feedback_for_admin_id_fk_2821878')->references('id')->on('feedback_for_admins')->onDelete('cascade');
            $table->unsignedBigInteger('product_for_vendor_id');
            $table->foreign('product_for_vendor_id', 'product_for_vendor_id_fk_2821878')->references('id')->on('product_for_vendors')->onDelete('cascade');
        });
    }
}
