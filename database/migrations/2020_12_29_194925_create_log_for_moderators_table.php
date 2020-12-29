<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogForModeratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_for_moderators', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('action_taken_by_id');
            $table->foreign('action_taken_by_id')->references('id')->on('users');
            $table->unsignedBigInteger('action_taken_on_id');
            $table->enum('type',['product','service']);
            $table->enum('action_type',['approved','rejected']);

//            $table->unsignedBigInteger('action_taken_on_vendor_id');
//            $table->foreign('action_taken_on_vendor_id')->references('id')->on('users');
//
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_for_moderators');
    }
}
