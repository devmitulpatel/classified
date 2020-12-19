<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageBoxesTable extends Migration
{
    public function up()
    {
        Schema::create('message_boxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('message');
            $table->string('read_status')->nullable();
            $table->string('deliver_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
