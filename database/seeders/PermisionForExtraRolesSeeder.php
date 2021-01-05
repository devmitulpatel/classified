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


        $modeExtraPermission=[
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 149,
                'title' => 'profile_password_edit',
                ],
            [
                'id'    => 93,
                'title' => 'product_for_vendor_show',
                ],
            [
                'id'    => 99,
                'title' => 'service_for_vendor_show',
                ],

//            [
//                'id'    => 91,
//                'title' => 'product_for_vendor_create',
//            ],
            [
                'id'    => 92,
                'title' => 'product_for_vendor_edit',
            ],
            [
                'id'    => 93,
                'title' => 'product_for_vendor_show',
            ],
//            [
//                'id'    => 94,
//                'title' => 'product_for_vendor_delete',
//            ],
            [
                'id'    => 95,
                'title' => 'product_for_vendor_access',
            ],
//            [
//                'id'    => 97,
//                'title' => 'service_for_vendor_create',
//            ],
            [
                'id'    => 98,
                'title' => 'service_for_vendor_edit',
            ],
            [
                'id'    => 99,
                'title' => 'service_for_vendor_show',
            ],
//            [
//                'id'    => 100,
//                'title' => 'service_for_vendor_delete',
//            ],
            [
                'id'    => 101,
                'title' => 'service_for_vendor_access',
            ],




        ];
        foreach ($modeExtraPermission as $v)$moderator_permissions->push($v);



        Role::findOrFail(3)->permissions()->sync($moderator_permissions);
        $neddle='for_vendor';
        $vendor_permissions = $admin_permissions->filter(function ($permission)use($neddle) {
            return stripos ($permission->title,$neddle);
        });

        Role::findOrFail(4)->permissions()->sync($vendor_permissions);
    }
}
