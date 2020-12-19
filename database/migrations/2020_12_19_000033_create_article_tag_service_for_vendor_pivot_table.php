<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTagServiceForVendorPivotTable extends Migration
{
    public function up()
    {
        Schema::create('article_tag_service_for_vendor', function (Blueprint $table) {
            $table->unsignedBigInteger('service_for_vendor_id');
            $table->foreign('service_for_vendor_id', 'service_for_vendor_id_fk_2821984')->references('id')->on('service_for_vendors')->onDelete('cascade');
            $table->unsignedBigInteger('article_tag_id');
            $table->foreign('article_tag_id', 'article_tag_id_fk_2821984')->references('id')->on('article_tags')->onDelete('cascade');
        });
    }
}
