<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductForVendorQueryFromWebsiteForAdminPivotTable extends Migration
{
    public function up()
    {
        Schema::create('product_for_vendor_query_from_website_for_admin', function (Blueprint $table) {
            $table->unsignedBigInteger('query_from_website_for_admin_id');
            $table->foreign('query_from_website_for_admin_id', 'query_from_website_for_admin_id_fk_2821889')->references('id')->on('query_from_website_for_admins')->onDelete('cascade');
            $table->unsignedBigInteger('product_for_vendor_id');
            $table->foreign('product_for_vendor_id', 'product_for_vendor_id_fk_2821889')->references('id')->on('product_for_vendors')->onDelete('cascade');
        });
    }
}
