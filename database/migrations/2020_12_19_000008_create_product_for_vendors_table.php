<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductForVendorsTable extends Migration
{
    public function up()
    {
        Schema::create('product_for_vendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->decimal('price_start', 15, 2)->nullable();
            $table->decimal('price_max', 15, 2)->nullable();
            $table->string('tax_included')->nullable();
            $table->string('tax_rate')->nullable();
            $table->boolean('rejected')->default(false);
            $table->decimal('shipping_cost', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
