<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductForVendorsTable extends Migration
{
    public function up()
    {
        Schema::table('product_for_vendors', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_fk_2821751')->references('id')->on('categories_for_admins');
            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('sub_category_id', 'sub_category_fk_2821752')->references('id')->on('sub_category_for_admins');
            $table->unsignedBigInteger('approved_by_id')->nullable();
            $table->foreign('approved_by_id', 'approved_by_fk_2821756')->references('id')->on('users');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_2821760')->references('id')->on('users');
        });
    }
}
