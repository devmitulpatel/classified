<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPServiceListingForVendorsTable extends Migration
{
    public function up()
    {
        Schema::table('p_service_listing_for_vendors', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id', 'service_fk_2821816')->references('id')->on('p_service_listing_for_vendors');
            $table->unsignedBigInteger('plan_id');
            $table->foreign('plan_id', 'plan_fk_2821821')->references('id')->on('plans');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_2821824')->references('id')->on('users');
        });
    }
}
