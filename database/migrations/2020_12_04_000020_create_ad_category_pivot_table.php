<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdCategoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('ad_category', function (Blueprint $table) {
            $table->unsignedBigInteger('ad_id');
            $table->foreign('ad_id', 'ad_id_fk_2716177')->references('id')->on('ads')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_id_fk_2716177')->references('id')->on('categories')->onDelete('cascade');
        });
    }
}
