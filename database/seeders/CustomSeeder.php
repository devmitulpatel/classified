<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            ExtraUsersToTableSeeder::class,
            ExtraRolesToUserTable::class,
            PermisionForExtraRolesSeeder::class,
            ExtraUsersRolesToTableSeeder::class,
            DemoCategorySeeder::class,
            DemoSubCategorySeeder::class,
            WebsiteSettingTableSeeder::class,
            EmailSettingTableSeeder::class,
            PaymentGatewayTableSeeder::class,
            DemoHighlightedCitiesSeeder::class,
            DemoHighlightedCategoiesSeeder::class,


        ]);

    }
}
