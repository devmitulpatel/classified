<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCategoriesForAdminsTable extends Migration
{
    public function up()
    {
        Schema::table('categories_for_admins', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_2821712')->references('id')->on('users');
        });
    }
}
