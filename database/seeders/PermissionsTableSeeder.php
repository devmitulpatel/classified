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
                'title' => 'message_box_create',
            ],
            [
                'id'    => 18,
                'title' => 'message_box_edit',
            ],
            [
                'id'    => 19,
                'title' => 'message_box_show',
            ],
            [
                'id'    => 20,
                'title' => 'message_box_delete',
            ],
            [
                'id'    => 21,
                'title' => 'message_box_access',
            ],
            [
                'id'    => 22,
                'title' => 'admin_access',
            ],
            [
                'id'    => 23,
                'title' => 'plan_create',
            ],
            [
                'id'    => 24,
                'title' => 'plan_edit',
            ],
            [
                'id'    => 25,
                'title' => 'plan_show',
            ],
            [
                'id'    => 26,
                'title' => 'plan_delete',
            ],
            [
                'id'    => 27,
                'title' => 'plan_access',
            ],
            [
                'id'    => 28,
                'title' => 'ad_create',
            ],
            [
                'id'    => 29,
                'title' => 'ad_edit',
            ],
            [
                'id'    => 30,
                'title' => 'ad_show',
            ],
            [
                'id'    => 31,
                'title' => 'ad_delete',
            ],
            [
                'id'    => 32,
                'title' => 'ad_access',
            ],
            [
                'id'    => 33,
                'title' => 'slider_create',
            ],
            [
                'id'    => 34,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 35,
                'title' => 'slider_show',
            ],
            [
                'id'    => 36,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 37,
                'title' => 'slider_access',
            ],
            [
                'id'    => 38,
                'title' => 'user_menu_access',
            ],
            [
                'id'    => 39,
                'title' => 'services_for_user_access',
            ],
            [
                'id'    => 40,
                'title' => 'products_for_user_access',
            ],
            [
                'id'    => 41,
                'title' => 'massage_box_for_moderator_access',
            ],
            [
                'id'    => 42,
                'title' => 'massage_box_for_user_access',
            ],
            [
                'id'    => 43,
                'title' => 'profile_for_moderator_access',
            ],
            [
                'id'    => 44,
                'title' => 'profile_for_user_access',
            ],
            [
                'id'    => 45,
                'title' => 'website_access',
            ],
            [
                'id'    => 46,
                'title' => 'top_navigation_create',
            ],
            [
                'id'    => 47,
                'title' => 'top_navigation_edit',
            ],
            [
                'id'    => 48,
                'title' => 'top_navigation_show',
            ],
            [
                'id'    => 49,
                'title' => 'top_navigation_delete',
            ],
            [
                'id'    => 50,
                'title' => 'top_navigation_access',
            ],
            [
                'id'    => 51,
                'title' => 'highlighted_category_create',
            ],
            [
                'id'    => 52,
                'title' => 'highlighted_category_edit',
            ],
            [
                'id'    => 53,
                'title' => 'highlighted_category_show',
            ],
            [
                'id'    => 54,
                'title' => 'highlighted_category_delete',
            ],
            [
                'id'    => 55,
                'title' => 'highlighted_category_access',
            ],
            [
                'id'    => 56,
                'title' => 'highlighted_sub_category_create',
            ],
            [
                'id'    => 57,
                'title' => 'highlighted_sub_category_edit',
            ],
            [
                'id'    => 58,
                'title' => 'highlighted_sub_category_show',
            ],
            [
                'id'    => 59,
                'title' => 'highlighted_sub_category_delete',
            ],
            [
                'id'    => 60,
                'title' => 'highlighted_sub_category_access',
            ],
            [
                'id'    => 61,
                'title' => 'client_review_create',
            ],
            [
                'id'    => 62,
                'title' => 'client_review_edit',
            ],
            [
                'id'    => 63,
                'title' => 'client_review_show',
            ],
            [
                'id'    => 64,
                'title' => 'client_review_delete',
            ],
            [
                'id'    => 65,
                'title' => 'client_review_access',
            ],
            [
                'id'    => 66,
                'title' => 'article_create',
            ],
            [
                'id'    => 67,
                'title' => 'article_edit',
            ],
            [
                'id'    => 68,
                'title' => 'article_show',
            ],
            [
                'id'    => 69,
                'title' => 'article_delete',
            ],
            [
                'id'    => 70,
                'title' => 'article_access',
            ],
            [
                'id'    => 71,
                'title' => 'article_tag_create',
            ],
            [
                'id'    => 72,
                'title' => 'article_tag_edit',
            ],
            [
                'id'    => 73,
                'title' => 'article_tag_show',
            ],
            [
                'id'    => 74,
                'title' => 'article_tag_delete',
            ],
            [
                'id'    => 75,
                'title' => 'article_tag_access',
            ],
            [
                'id'    => 76,
                'title' => 'website_setting_create',
            ],
            [
                'id'    => 77,
                'title' => 'website_setting_edit',
            ],
            [
                'id'    => 78,
                'title' => 'website_setting_show',
            ],
            [
                'id'    => 79,
                'title' => 'website_setting_delete',
            ],
            [
                'id'    => 80,
                'title' => 'website_setting_access',
            ],
            [
                'id'    => 81,
                'title' => 'categories_for_admin_create',
            ],
            [
                'id'    => 82,
                'title' => 'categories_for_admin_edit',
            ],
            [
                'id'    => 83,
                'title' => 'categories_for_admin_show',
            ],
            [
                'id'    => 84,
                'title' => 'categories_for_admin_delete',
            ],
            [
                'id'    => 85,
                'title' => 'categories_for_admin_access',
            ],
            [
                'id'    => 86,
                'title' => 'sub_category_for_admin_create',
            ],
            [
                'id'    => 87,
                'title' => 'sub_category_for_admin_edit',
            ],
            [
                'id'    => 88,
                'title' => 'sub_category_for_admin_show',
            ],
            [
                'id'    => 89,
                'title' => 'sub_category_for_admin_delete',
            ],
            [
                'id'    => 90,
                'title' => 'sub_category_for_admin_access',
            ],
            [
                'id'    => 91,
                'title' => 'product_for_vendor_create',
            ],
            [
                'id'    => 92,
                'title' => 'product_for_vendor_edit',
            ],
            [
                'id'    => 93,
                'title' => 'product_for_vendor_show',
            ],
            [
                'id'    => 94,
                'title' => 'product_for_vendor_delete',
            ],
            [
                'id'    => 95,
                'title' => 'product_for_vendor_access',
            ],
            [
                'id'    => 96,
                'title' => 'vendor_access',
            ],
            [
                'id'    => 97,
                'title' => 'service_for_vendor_create',
            ],
            [
                'id'    => 98,
                'title' => 'service_for_vendor_edit',
            ],
            [
                'id'    => 99,
                'title' => 'service_for_vendor_show',
            ],
            [
                'id'    => 100,
                'title' => 'service_for_vendor_delete',
            ],
            [
                'id'    => 101,
                'title' => 'service_for_vendor_access',
            ],
            [
                'id'    => 102,
                'title' => 'p_product_listing_for_vendor_create',
            ],
            [
                'id'    => 103,
                'title' => 'p_product_listing_for_vendor_edit',
            ],
            [
                'id'    => 104,
                'title' => 'p_product_listing_for_vendor_show',
            ],
            [
                'id'    => 105,
                'title' => 'p_product_listing_for_vendor_delete',
            ],
            [
                'id'    => 106,
                'title' => 'p_product_listing_for_vendor_access',
            ],
            [
                'id'    => 107,
                'title' => 'p_service_listing_for_vendor_create',
            ],
            [
                'id'    => 108,
                'title' => 'p_service_listing_for_vendor_edit',
            ],
            [
                'id'    => 109,
                'title' => 'p_service_listing_for_vendor_show',
            ],
            [
                'id'    => 110,
                'title' => 'p_service_listing_for_vendor_delete',
            ],
            [
                'id'    => 111,
                'title' => 'p_service_listing_for_vendor_access',
            ],
            [
                'id'    => 112,
                'title' => 'permission_group_for_admin_create',
            ],
            [
                'id'    => 113,
                'title' => 'permission_group_for_admin_edit',
            ],
            [
                'id'    => 114,
                'title' => 'permission_group_for_admin_show',
            ],
            [
                'id'    => 115,
                'title' => 'permission_group_for_admin_delete',
            ],
            [
                'id'    => 116,
                'title' => 'permission_group_for_admin_access',
            ],
            [
                'id'    => 117,
                'title' => 'feedback_for_admin_create',
            ],
            [
                'id'    => 118,
                'title' => 'feedback_for_admin_edit',
            ],
            [
                'id'    => 119,
                'title' => 'feedback_for_admin_show',
            ],
            [
                'id'    => 120,
                'title' => 'feedback_for_admin_delete',
            ],
            [
                'id'    => 121,
                'title' => 'feedback_for_admin_access',
            ],
            [
                'id'    => 122,
                'title' => 'query_from_website_for_admin_create',
            ],
            [
                'id'    => 123,
                'title' => 'query_from_website_for_admin_edit',
            ],
            [
                'id'    => 124,
                'title' => 'query_from_website_for_admin_show',
            ],
            [
                'id'    => 125,
                'title' => 'query_from_website_for_admin_delete',
            ],
            [
                'id'    => 126,
                'title' => 'query_from_website_for_admin_access',
            ],
            [
                'id'    => 127,
                'title' => 'p_to_approve_for_moderator_access',
            ],
            [
                'id'    => 128,
                'title' => 's_to_approve_for_moderator_access',
            ],
            [
                'id'    => 129,
                'title' => 'moderator_for_moderator_access',
            ],
            [
                'id'    => 130,
                'title' => 'to_approve_vendor_for_admin_access',
            ],
            [
                'id'    => 131,
                'title' => 'payment_gateway_for_admin_edit',
            ],
            [
                'id'    => 132,
                'title' => 'payment_gateway_for_admin_show',
            ],
            [
                'id'    => 133,
                'title' => 'payment_gateway_for_admin_access',
            ],
            [
                'id'    => 134,
                'title' => 'email_settings_for_admin_edit',
            ],
            [
                'id'    => 135,
                'title' => 'email_settings_for_admin_show',
            ],
            [
                'id'    => 136,
                'title' => 'email_settings_for_admin_access',
            ],
            [
                'id'    => 137,
                'title' => 'message_box_for_vendor_access',
            ],
            [
                'id'    => 138,
                'title' => 'profile_for_vendor_access',
            ],
            [
                'id'    => 139,
                'title' => 'highlighted_cities_for_admin_create',
            ],
            [
                'id'    => 140,
                'title' => 'highlighted_cities_for_admin_edit',
            ],
            [
                'id'    => 141,
                'title' => 'highlighted_cities_for_admin_show',
            ],
            [
                'id'    => 142,
                'title' => 'highlighted_cities_for_admin_delete',
            ],
            [
                'id'    => 143,
                'title' => 'highlighted_cities_for_admin_access',
            ],
            [
                'id'    => 144,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
