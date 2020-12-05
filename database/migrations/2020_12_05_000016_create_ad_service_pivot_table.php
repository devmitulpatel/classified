<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdServicePivotTable extends Migration
{
    public function up()
    {
        Schema::create('ad_service', function (Blueprint $table) {
            $table->unsignedBigInteger('ad_id');
            $table->foreign('ad_id', 'ad_id_fk_2716180')->references('id')->on('ads')->onDelete('cascade');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id', 'service_id_fk_2716180')->references('id')->on('services')->onDelete('cascade');
        });
    }
}
