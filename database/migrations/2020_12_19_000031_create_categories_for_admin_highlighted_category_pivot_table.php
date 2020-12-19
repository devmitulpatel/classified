<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesForAdminHighlightedCategoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('categories_for_admin_highlighted_category', function (Blueprint $table) {
            $table->unsignedBigInteger('highlighted_category_id');
            $table->foreign('highlighted_category_id', 'highlighted_category_id_fk_2750291')->references('id')->on('highlighted_categories')->onDelete('cascade');
            $table->unsignedBigInteger('categories_for_admin_id');
            $table->foreign('categories_for_admin_id', 'categories_for_admin_id_fk_2750291')->references('id')->on('categories_for_admins')->onDelete('cascade');
        });
    }
}
