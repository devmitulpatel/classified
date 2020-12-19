<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionPermissionGroupForAdminPivotTable extends Migration
{
    public function up()
    {
        Schema::create('permission_permission_group_for_admin', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_group_for_admin_id');
            $table->foreign('permission_group_for_admin_id', 'permission_group_for_admin_id_fk_2821871')->references('id')->on('permission_group_for_admins')->onDelete('cascade');
            $table->unsignedBigInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_2821871')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
