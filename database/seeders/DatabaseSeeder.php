<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
        //    PermissionsGroupTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            ExtraUsersToTableSeeder::class,
            ExtraRolesToUserTable::class,
            RoleUserTableSeeder::class,
            PermisionForExtraRolesSeeder::class,
            ExtraUsersRolesToTableSeeder::class,
            DemoCategorySeeder::class,
            DemoSubCategorySeeder::class,
            WebsiteSettingTableSeeder::class,
            EmailSettingTableSeeder::class,
            PaymentGatewayTableSeeder::class,
        ]);
    }
}
