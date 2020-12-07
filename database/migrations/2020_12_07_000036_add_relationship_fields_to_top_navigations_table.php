<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTopNavigationsTable extends Migration
{
    public function up()
    {
        Schema::table('top_navigations', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id');
            $table->foreign('parent_id', 'parent_fk_2750286')->references('id')->on('top_navigations');
        });
    }
}
