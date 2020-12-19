<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdSubCategoryForAdminPivotTable extends Migration
{
    public function up()
    {
        Schema::create('ad_sub_category_for_admin', function (Blueprint $table) {
            $table->unsignedBigInteger('ad_id');
            $table->foreign('ad_id', 'ad_id_fk_2716178')->references('id')->on('ads')->onDelete('cascade');
            $table->unsignedBigInteger('sub_category_for_admin_id');
            $table->foreign('sub_category_for_admin_id', 'sub_category_for_admin_id_fk_2716178')->references('id')->on('sub_category_for_admins')->onDelete('cascade');
        });
    }
}
