<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSubCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_2716009')->references('id')->on('users');
            $table->unsignedBigInteger('parent_category_id')->nullable();
            $table->foreign('parent_category_id', 'parent_category_fk_2716010')->references('id')->on('categories');
        });
    }
}
