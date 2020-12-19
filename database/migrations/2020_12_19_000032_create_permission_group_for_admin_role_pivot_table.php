<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionGroupForAdminRolePivotTable extends Migration
{
    public function up()
    {
        Schema::create('permission_group_for_admin_role', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id', 'role_id_fk_2821900')->references('id')->on('roles')->onDelete('cascade');
            $table->unsignedBigInteger('permission_group_for_admin_id');
            $table->foreign('permission_group_for_admin_id', 'permission_group_for_admin_id_fk_2821900')->references('id')->on('permission_group_for_admins')->onDelete('cascade');
        });
    }
}
