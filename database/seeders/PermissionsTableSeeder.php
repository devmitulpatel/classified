<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
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
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'category_create',
            ],
            [
                'id'    => 18,
                'title' => 'category_edit',
            ],
            [
                'id'    => 19,
                'title' => 'category_show',
            ],
            [
                'id'    => 20,
                'title' => 'category_delete',
            ],
            [
                'id'    => 21,
                'title' => 'category_access',
            ],
            [
                'id'    => 22,
                'title' => 'product_service_access',
            ],
            [
                'id'    => 23,
                'title' => 'sub_category_create',
            ],
            [
                'id'    => 24,
                'title' => 'sub_category_edit',
            ],
            [
                'id'    => 25,
                'title' => 'sub_category_show',
            ],
            [
                'id'    => 26,
                'title' => 'sub_category_delete',
            ],
            [
                'id'    => 27,
                'title' => 'sub_category_access',
            ],
            [
                'id'    => 28,
                'title' => 'product_create',
            ],
            [
                'id'    => 29,
                'title' => 'product_edit',
            ],
            [
                'id'    => 30,
                'title' => 'product_show',
            ],
            [
                'id'    => 31,
                'title' => 'product_delete',
            ],
            [
                'id'    => 32,
                'title' => 'product_access',
            ],
            [
                'id'    => 33,
                'title' => 'service_create',
            ],
            [
                'id'    => 34,
                'title' => 'service_edit',
            ],
            [
                'id'    => 35,
                'title' => 'service_show',
            ],
            [
                'id'    => 36,
                'title' => 'service_delete',
            ],
            [
                'id'    => 37,
                'title' => 'service_access',
            ],
            [
                'id'    => 38,
                'title' => 'premium_product_listing_create',
            ],
            [
                'id'    => 39,
                'title' => 'premium_product_listing_edit',
            ],
            [
                'id'    => 40,
                'title' => 'premium_product_listing_show',
            ],
            [
                'id'    => 41,
                'title' => 'premium_product_listing_delete',
            ],
            [
                'id'    => 42,
                'title' => 'premium_product_listing_access',
            ],
            [
                'id'    => 43,
                'title' => 'premium_service_listing_create',
            ],
            [
                'id'    => 44,
                'title' => 'premium_service_listing_edit',
            ],
            [
                'id'    => 45,
                'title' => 'premium_service_listing_show',
            ],
            [
                'id'    => 46,
                'title' => 'premium_service_listing_delete',
            ],
            [
                'id'    => 47,
                'title' => 'premium_service_listing_access',
            ],
            [
                'id'    => 48,
                'title' => 'message_box_create',
            ],
            [
                'id'    => 49,
                'title' => 'message_box_edit',
            ],
            [
                'id'    => 50,
                'title' => 'message_box_show',
            ],
            [
                'id'    => 51,
                'title' => 'message_box_delete',
            ],
            [
                'id'    => 52,
                'title' => 'message_box_access',
            ],
            [
                'id'    => 53,
                'title' => 'admin_access',
            ],
            [
                'id'    => 54,
                'title' => 'plan_create',
            ],
            [
                'id'    => 55,
                'title' => 'plan_edit',
            ],
            [
                'id'    => 56,
                'title' => 'plan_show',
            ],
            [
                'id'    => 57,
                'title' => 'plan_delete',
            ],
            [
                'id'    => 58,
                'title' => 'plan_access',
            ],
            [
                'id'    => 59,
                'title' => 'ad_create',
            ],
            [
                'id'    => 60,
                'title' => 'ad_edit',
            ],
            [
                'id'    => 61,
                'title' => 'ad_show',
            ],
            [
                'id'    => 62,
                'title' => 'ad_delete',
            ],
            [
                'id'    => 63,
                'title' => 'ad_access',
            ],
            [
                'id'    => 64,
                'title' => 'payment_gateway_configuration_access',
            ],
            [
                'id'    => 65,
                'title' => 'email_configuration_access',
            ],
            [
                'id'    => 66,
                'title' => 'slider_create',
            ],
            [
                'id'    => 67,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 68,
                'title' => 'slider_show',
            ],
            [
                'id'    => 69,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 70,
                'title' => 'slider_access',
            ],
            [
                'id'    => 71,
                'title' => 'moderator_menu_access',
            ],
            [
                'id'    => 72,
                'title' => 'user_menu_access',
            ],
            [
                'id'    => 73,
                'title' => 'service_to_approve_access',
            ],
            [
                'id'    => 74,
                'title' => 'services_for_user_access',
            ],
            [
                'id'    => 75,
                'title' => 'products_for_user_access',
            ],
            [
                'id'    => 76,
                'title' => 'massage_box_for_moderator_access',
            ],
            [
                'id'    => 77,
                'title' => 'massage_box_for_user_access',
            ],
            [
                'id'    => 78,
                'title' => 'profile_for_moderator_access',
            ],
            [
                'id'    => 79,
                'title' => 'profile_for_user_access',
            ],
            [
                'id'    => 80,
                'title' => 'product_to_approve_access',
            ],
            [
                'id'    => 81,
                'title' => 'website_access',
            ],
            [
                'id'    => 82,
                'title' => 'top_navigation_create',
            ],
            [
                'id'    => 83,
                'title' => 'top_navigation_edit',
            ],
            [
                'id'    => 84,
                'title' => 'top_navigation_show',
            ],
            [
                'id'    => 85,
                'title' => 'top_navigation_delete',
            ],
            [
                'id'    => 86,
                'title' => 'top_navigation_access',
            ],
            [
                'id'    => 87,
                'title' => 'highlighted_category_create',
            ],
            [
                'id'    => 88,
                'title' => 'highlighted_category_edit',
            ],
            [
                'id'    => 89,
                'title' => 'highlighted_category_show',
            ],
            [
                'id'    => 90,
                'title' => 'highlighted_category_delete',
            ],
            [
                'id'    => 91,
                'title' => 'highlighted_category_access',
            ],
            [
                'id'    => 92,
                'title' => 'highlighted_sub_category_create',
            ],
            [
                'id'    => 93,
                'title' => 'highlighted_sub_category_edit',
            ],
            [
                'id'    => 94,
                'title' => 'highlighted_sub_category_show',
            ],
            [
                'id'    => 95,
                'title' => 'highlighted_sub_category_delete',
            ],
            [
                'id'    => 96,
                'title' => 'highlighted_sub_category_access',
            ],
            [
                'id'    => 97,
                'title' => 'client_review_create',
            ],
            [
                'id'    => 98,
                'title' => 'client_review_edit',
            ],
            [
                'id'    => 99,
                'title' => 'client_review_show',
            ],
            [
                'id'    => 100,
                'title' => 'client_review_delete',
            ],
            [
                'id'    => 101,
                'title' => 'client_review_access',
            ],
            [
                'id'    => 102,
                'title' => 'article_create',
            ],
            [
                'id'    => 103,
                'title' => 'article_edit',
            ],
            [
                'id'    => 104,
                'title' => 'article_show',
            ],
            [
                'id'    => 105,
                'title' => 'article_delete',
            ],
            [
                'id'    => 106,
                'title' => 'article_access',
            ],
            [
                'id'    => 107,
                'title' => 'article_tag_create',
            ],
            [
                'id'    => 108,
                'title' => 'article_tag_edit',
            ],
            [
                'id'    => 109,
                'title' => 'article_tag_show',
            ],
            [
                'id'    => 110,
                'title' => 'article_tag_delete',
            ],
            [
                'id'    => 111,
                'title' => 'article_tag_access',
            ],
            [
                'id'    => 112,
                'title' => 'website_setting_create',
            ],
            [
                'id'    => 113,
                'title' => 'website_setting_edit',
            ],
            [
                'id'    => 114,
                'title' => 'website_setting_show',
            ],
            [
                'id'    => 115,
                'title' => 'website_setting_delete',
            ],
            [
                'id'    => 116,
                'title' => 'website_setting_access',
            ],
            [
                'id'    => 117,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
