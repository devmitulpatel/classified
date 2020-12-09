<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHighlightedSubCategorySubCategoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('highlighted_sub_category_sub_category', function (Blueprint $table) {
            $table->unsignedBigInteger('highlighted_sub_category_id');
            $table->foreign('highlighted_sub_category_id', 'highlighted_sub_category_id_fk_2750298')->references('id')->on('highlighted_sub_categories')->onDelete('cascade');
            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('sub_category_id', 'sub_category_id_fk_2750298')->references('id')->on('sub_categories')->onDelete('cascade');
        });
    }
}
