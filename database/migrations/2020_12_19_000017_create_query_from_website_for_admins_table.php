<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueryFromWebsiteForAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('query_from_website_for_admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('company')->nullable();
            $table->longText('content');
            $table->string('contact_no')->nullable();
            $table->string('current_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
