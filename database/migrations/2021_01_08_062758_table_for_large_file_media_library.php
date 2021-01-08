<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableForLargeFileMediaLibrary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('large_file_media_library', function (Blueprint $table) {
            $table->id();
            $table->uuid('file_id');
            $table->unsignedBigInteger('part');
            $table->longText('raw_data')->nullable();
            $table->unsignedBigInteger('total_part')->default(1);
            $table->string('model');
            $table->string('collection');
            $table->string('final_path')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_ext')->nullable();
            $table->unsignedBigInteger('file_size')->nullable();
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
        Schema::dropIfExists('large_file_media_library');
    }
}
