<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMessageBoxesTable extends Migration
{
    public function up()
    {
        Schema::table('message_boxes', function (Blueprint $table) {
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id', 'users_fk_2716137')->references('id')->on('users');
            $table->unsignedBigInteger('from_id');
            $table->foreign('from_id', 'from_fk_2716138')->references('id')->on('users');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_2716144')->references('id')->on('users');
        });
    }
}
