<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPaymentForAdminsTable extends Migration
{
    public function up()
    {
        Schema::table('payment_for_admins', function (Blueprint $table) {
            $table->unsignedBigInteger('method_id')->nullable();
            $table->foreign('method_id', 'method_fk_2823026')->references('id')->on('payment_gateway_for_admins');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_2823027')->references('id')->on('users');
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->foreign('plan_id', 'plan_fk_2823029')->references('id')->on('plans');
            $table->unsignedBigInteger('ref_service_id')->nullable();
            $table->foreign('ref_service_id', 'ref_service_fk_2823031')->references('id')->on('service_for_vendors');
            $table->unsignedBigInteger('approved_by_id')->nullable();
            $table->foreign('approved_by_id', 'approved_by_fk_2823032')->references('id')->on('users');
        });
    }
}
