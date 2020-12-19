<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceForVendorsTable extends Migration
{
    public function up()
    {
        Schema::create('service_for_vendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->longText('description')->nullable();
            $table->decimal('price_start', 15, 2)->nullable();
            $table->decimal('price_max', 15, 2)->nullable();
            $table->decimal('shipping_cost', 15, 2)->nullable();
            $table->string('tax_included')->nullable();
            $table->string('tax_rate')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
