<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremiumProductListingsTable extends Migration
{
    public function up()
    {
        Schema::create('premium_product_listings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('expire_on');
            $table->date('start_from');
            $table->string('active')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
