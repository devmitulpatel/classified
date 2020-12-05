<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('monthly_active')->nullable();
            $table->float('monthly_cost', 15, 2)->nullable();
            $table->string('half_year_active')->nullable();
            $table->float('half_yearly_cost', 15, 2)->nullable();
            $table->string('yearly_active')->nullable();
            $table->float('yearly_cost', 15, 2)->nullable();
            $table->string('two_year_bundle_active')->nullable();
            $table->float('two_year_bundle_cost', 15, 2)->nullable();
            $table->string('three_year_bundle_active')->nullable();
            $table->float('three_year_bundle_cost', 15, 2)->nullable();
            $table->string('life_time_active')->nullable();
            $table->float('life_time_cost', 15, 2)->nullable();
            $table->integer('currency')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
