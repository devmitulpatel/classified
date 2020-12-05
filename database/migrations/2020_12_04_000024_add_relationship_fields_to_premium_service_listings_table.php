<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPremiumServiceListingsTable extends Migration
{
    public function up()
    {
        Schema::table('premium_service_listings', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id', 'service_fk_2716091')->references('id')->on('services');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_2716099')->references('id')->on('users');
            $table->unsignedBigInteger('plan_id');
            $table->foreign('plan_id', 'plan_fk_2718929')->references('id')->on('plans');
        });
    }
}
