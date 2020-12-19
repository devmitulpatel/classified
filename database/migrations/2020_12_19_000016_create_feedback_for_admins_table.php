<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackForAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('feedback_for_admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('company')->nullable();
            $table->longText('content');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
