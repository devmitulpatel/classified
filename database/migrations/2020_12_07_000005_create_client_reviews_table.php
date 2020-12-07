<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('client_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('job_post');
            $table->string('company');
            $table->longText('comment');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
