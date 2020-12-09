<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPremiumProductListingsTable extends Migration
{
    public function up()
    {
        Schema::table('premium_product_listings', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id', 'product_fk_2716069')->references('id')->on('products');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_2716077')->references('id')->on('users');
            $table->unsignedBigInteger('plan_id');
            $table->foreign('plan_id', 'plan_fk_2718928')->references('id')->on('plans');
        });
    }
}
