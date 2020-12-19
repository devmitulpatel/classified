<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdCategoriesForAdminPivotTable extends Migration
{
    public function up()
    {
        Schema::create('ad_categories_for_admin', function (Blueprint $table) {
            $table->unsignedBigInteger('ad_id');
            $table->foreign('ad_id', 'ad_id_fk_2716177')->references('id')->on('ads')->onDelete('cascade');
            $table->unsignedBigInteger('categories_for_admin_id');
            $table->foreign('categories_for_admin_id', 'categories_for_admin_id_fk_2716177')->references('id')->on('categories_for_admins')->onDelete('cascade');
        });
    }
}
