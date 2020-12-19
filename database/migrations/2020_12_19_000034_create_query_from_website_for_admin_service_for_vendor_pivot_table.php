<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueryFromWebsiteForAdminServiceForVendorPivotTable extends Migration
{
    public function up()
    {
        Schema::create('query_from_website_for_admin_service_for_vendor', function (Blueprint $table) {
            $table->unsignedBigInteger('query_from_website_for_admin_id');
            $table->foreign('query_from_website_for_admin_id', 'query_from_website_for_admin_id_fk_2821890')->references('id')->on('query_from_website_for_admins')->onDelete('cascade');
            $table->unsignedBigInteger('service_for_vendor_id');
            $table->foreign('service_for_vendor_id', 'service_for_vendor_id_fk_2821890')->references('id')->on('service_for_vendors')->onDelete('cascade');
        });
    }
}
