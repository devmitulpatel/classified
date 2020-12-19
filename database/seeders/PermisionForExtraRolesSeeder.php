<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermisionForExtraRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_permissions = Permission::all();

        $neddle='for_user';
        $user_permissions = $admin_permissions->filter(function ($permission)use($neddle) {
            return stripos ($permission->title,$neddle);
        });
        Role::findOrFail(2)->permissions()->sync($user_permissions);
        $neddle='for_moderator';
        $moderator_permissions = $admin_permissions->filter(function ($permission)use($neddle) {
            return stripos ($permission->title,$neddle);
        });
        Role::findOrFail(3)->permissions()->sync($moderator_permissions);
        $neddle='for_vendor';
        $vendor_permissions = $admin_permissions->filter(function ($permission)use($neddle) {
            return stripos ($permission->title,$neddle);
        });
        Role::findOrFail(4)->permissions()->sync($vendor_permissions);
    }
}
