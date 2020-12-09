<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdSubCategoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('ad_sub_category', function (Blueprint $table) {
            $table->unsignedBigInteger('ad_id');
            $table->foreign('ad_id', 'ad_id_fk_2716178')->references('id')->on('ads')->onDelete('cascade');
            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('sub_category_id', 'sub_category_id_fk_2716178')->references('id')->on('sub_categories')->onDelete('cascade');
        });
    }
}
