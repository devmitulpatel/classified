<?php

namespace Database\Seeders;

use App\Models\WebsiteSetting;
use Illuminate\Database\Seeder;

class WebsiteSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[

            [
                'name'=>'website_header_title',
                'value'=>'Demo Title',
                'display_type'=>'string',
                'store_type'=>'string',
            ],
            [
                'name'=>'website_header_decription',
                'value'=>'Demo Description',
                'display_type'=>'string',
                'store_type'=>'string',
            ],
            [
                'name'=>'website_header_keyword',
                'value'=>'Demo,Description',
                'display_type'=>'string',
                'store_type'=>'string',
            ],


        ];

        WebsiteSetting::insert($data);
    }
}
