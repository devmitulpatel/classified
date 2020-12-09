<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryHighlightedCategoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('category_highlighted_category', function (Blueprint $table) {
            $table->unsignedBigInteger('highlighted_category_id');
            $table->foreign('highlighted_category_id', 'highlighted_category_id_fk_2750291')->references('id')->on('highlighted_categories')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_id_fk_2750291')->references('id')->on('categories')->onDelete('cascade');
        });
    }
}
