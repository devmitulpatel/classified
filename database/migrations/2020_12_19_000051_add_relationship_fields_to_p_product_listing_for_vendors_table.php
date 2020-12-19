<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPProductListingForVendorsTable extends Migration
{
    public function up()
    {
        Schema::table('p_product_listing_for_vendors', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id', 'product_fk_2821774')->references('id')->on('product_for_vendors');
            $table->unsignedBigInteger('plan_id');
            $table->foreign('plan_id', 'plan_fk_2821778')->references('id')->on('plans');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_2821782')->references('id')->on('users');
        });
    }
}
