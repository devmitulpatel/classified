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
                'name'=>'website_company_name',
                'value'=>'Company Name',
                'display_type'=>'0',
                'store_type'=>'0',
            ],

            [
                'name'=>'website_header_title',
                'value'=>'Demo Title',
                'display_type'=>'0',
                'store_type'=>'0',
            ],
            [
                'name'=>'website_header_decription',
                'value'=>'Demo Description',
                'display_type'=>'0',
                'store_type'=>'0',
            ],
            [
                'name'=>'website_header_keyword',
                'value'=>'Demo,Description',
                'display_type'=>'0',
                'store_type'=>'0',
            ],
            [
                'name'=>'website_max_file_upload_size',
                'value'=>'50',
                'display_type'=>'1',
                'store_type'=>'0',
            ],

            [
                'name'=>'website_default_currency',
                'value'=>'₹',
                'display_type'=>'0',
                'store_type'=>'0',
            ],

            [
                'name'=>'website_location_based_ad_service',
                'value'=>1,
                'display_type'=>'0',
                'store_type'=>'0',
            ],


            [
                'name'=>'website_official_address_line_1',
                'value'=>'17',
                'display_type'=>'0',
                'store_type'=>'0',
            ],

            [
                'name'=>'website_official_address_line_2',
                'value'=>'Princess Road',
                'display_type'=>'0',
                'store_type'=>'0',
            ],

            [
                'name'=>'website_official_address_line_3',
                'value'=>'Greater London',
                'display_type'=>'0',
                'store_type'=>'0',
            ],

            [
                'name'=>'website_official_pincode',
                'value'=>'395007',
                'display_type'=>'0',
                'store_type'=>'0',
            ],
            [
                'name'=>'website_official_city',
                'value'=>'Surat',
                'display_type'=>'0',
                'store_type'=>'0',
            ],
            [
                'name'=>'website_official_state',
                'value'=>'Gujarat',
                'display_type'=>'0',
                'store_type'=>'0',
            ],
            [
                'name'=>'website_official_address_country',
                'value'=>'India',
                'display_type'=>'0',
                'store_type'=>'0',
            ],

            [
                'name'=>'website_official_support_email',
                'value'=>'admin@test.com',
                'display_type'=>'0',
                'store_type'=>'0',
            ],
            [
                'name'=>'website_official_sales_email',
                'value'=>'sales@test.com',
                'display_type'=>'0',
                'store_type'=>'0',
            ],
            [
                'name'=>'website_official_support_no',
                'value'=>'(+0084) 912-3548-073',
                'display_type'=>'0',
                'store_type'=>'0',
            ],
            [
                'name'=>'website_official_toll_free',
                'value'=>'(+0084) 912-3548-075',
                'display_type'=>'0',
                'store_type'=>'0',
            ],

            [
                'name'=>'website_social_twitter',
                'value'=>'#',
                'display_type'=>'0',
                'store_type'=>'0',
            ],

            [
                'name'=>'website_social_facebook',
                'value'=>'#',
                'display_type'=>'0',
                'store_type'=>'0',
            ],

            [
                'name'=>'website_social_google_plus',
                'value'=>'#',
                'display_type'=>'0',
                'store_type'=>'0',
            ],

            [
                'name'=>'website_social_instagram',
                'value'=>'#',
                'display_type'=>'0',
                'store_type'=>'0',
            ],

            [
                'name'=>'website_social_rss',
                'value'=>'#',
                'display_type'=>'0',
                'store_type'=>'0',
            ],

        ];

        WebsiteSetting::insert($data);
    }
}
