<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHighlightedCitiesForAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('highlighted_cities_for_admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->longText('decription')->nullable();
            $table->longText('digital_location')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
