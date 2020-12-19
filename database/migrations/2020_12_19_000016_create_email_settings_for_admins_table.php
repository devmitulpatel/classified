<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailSettingsForAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('email_settings_for_admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->longText('value');
            $table->string('display_type');
            $table->string('store_type');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
