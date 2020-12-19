<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackForAdminServiceForVendorPivotTable extends Migration
{
    public function up()
    {
        Schema::create('feedback_for_admin_service_for_vendor', function (Blueprint $table) {
            $table->unsignedBigInteger('feedback_for_admin_id');
            $table->foreign('feedback_for_admin_id', 'feedback_for_admin_id_fk_2821879')->references('id')->on('feedback_for_admins')->onDelete('cascade');
            $table->unsignedBigInteger('service_for_vendor_id');
            $table->foreign('service_for_vendor_id', 'service_for_vendor_id_fk_2821879')->references('id')->on('service_for_vendors')->onDelete('cascade');
        });
    }
}
