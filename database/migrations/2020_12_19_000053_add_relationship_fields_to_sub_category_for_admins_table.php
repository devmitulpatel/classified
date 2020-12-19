<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSubCategoryForAdminsTable extends Migration
{
    public function up()
    {
        Schema::table('sub_category_for_admins', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_category_id')->nullable();
            $table->foreign('parent_category_id', 'parent_category_fk_2821715')->references('id')->on('categories_for_admins');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_2821721')->references('id')->on('users');
        });
    }
}
