<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentGatewayForAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('payment_gateway_for_admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->longText('creditinals_title')->nullable();
            $table->longText('creditinals_value')->nullable();
            $table->longText('description')->nullable();
            $table->string('mode')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
