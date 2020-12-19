<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTagProductForVendorPivotTable extends Migration
{
    public function up()
    {
        Schema::create('article_tag_product_for_vendor', function (Blueprint $table) {
            $table->unsignedBigInteger('product_for_vendor_id');
            $table->foreign('product_for_vendor_id', 'product_for_vendor_id_fk_2821960')->references('id')->on('product_for_vendors')->onDelete('cascade');
            $table->unsignedBigInteger('article_tag_id');
            $table->foreign('article_tag_id', 'article_tag_id_fk_2821960')->references('id')->on('article_tags')->onDelete('cascade');
        });
    }
}
