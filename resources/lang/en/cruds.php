<?php

return [
    'userManagement'            => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'                => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role'                      => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'title'                   => 'Title',
            'title_helper'            => ' ',
            'permissions'             => 'Permissions',
            'permissions_helper'      => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'permission_group'        => 'Permission Group',
            'permission_group_helper' => ' ',
        ],
    ],
    'user'                      => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'city'                     => 'City',
            'city_helper'              => ' ',
            'state'                    => 'State',
            'state_helper'             => ' ',
            'country'                  => 'Country',
            'country_helper'           => ' ',
            'pincode'                  => 'Pincode',
            'pincode_helper'           => ' ',
            'area'                     => 'Area',
            'area_helper'              => ' ',
            'contact_no'               => 'Contact No',
            'contact_no_helper'        => ' ',
            'digital_location'         => 'Digital Location',
            'digital_location_helper'  => ' ',
            'approved_by'              => 'Approved By',
            'approved_by_helper'       => ' ',
        ],
    ],
    'messageBox'                => [
        'title'          => 'Message Box',
        'title_singular' => 'Message Box',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'users'                 => 'Users',
            'users_helper'          => ' ',
            'from'                  => 'From',
            'from_helper'           => ' ',
            'message'               => 'Message',
            'message_helper'        => ' ',
            'files'                 => 'Files',
            'files_helper'          => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'created_by'            => 'Created By',
            'created_by_helper'     => ' ',
            'read_status'           => 'Read Status',
            'read_status_helper'    => ' ',
            'deliver_status'        => 'Deliver Status',
            'deliver_status_helper' => ' ',
        ],
    ],
    'admin'                     => [
        'title'          => 'Admin',
        'title_singular' => 'Admin',
    ],
    'plan'                      => [
        'title'          => 'Plans',
        'title_singular' => 'Plan',
        'fields'         => [
            'id'                              => 'ID',
            'id_helper'                       => ' ',
            'name'                            => 'Name',
            'name_helper'                     => ' ',
            'monthly_active'                  => 'Monthly Active',
            'monthly_active_helper'           => ' ',
            'monthly_cost'                    => 'Monthly Cost',
            'monthly_cost_helper'             => ' ',
            'half_year_active'                => 'Half Year Active',
            'half_year_active_helper'         => ' ',
            'half_yearly_cost'                => 'Half Yearly Cost',
            'half_yearly_cost_helper'         => ' ',
            'yearly_active'                   => 'Yearly Active',
            'yearly_active_helper'            => ' ',
            'yearly_cost'                     => 'Yearly Cost',
            'yearly_cost_helper'              => ' ',
            'two_year_bundle_active'          => 'Two Year Bundle Active',
            'two_year_bundle_active_helper'   => ' ',
            'two_year_bundle_cost'            => 'Two Year Bundle Cost',
            'two_year_bundle_cost_helper'     => ' ',
            'three_year_bundle_active'        => 'Three Year Bundle Active',
            'three_year_bundle_active_helper' => ' ',
            'three_year_bundle_cost'          => 'Three Year Bundle Cost',
            'three_year_bundle_cost_helper'   => ' ',
            'life_time_active'                => 'Life Time Active',
            'life_time_active_helper'         => ' ',
            'life_time_cost'                  => 'Life Time Cost',
            'life_time_cost_helper'           => ' ',
            'currency'                        => 'Currency',
            'currency_helper'                 => ' ',
            'created_at'                      => 'Created at',
            'created_at_helper'               => ' ',
            'updated_at'                      => 'Updated at',
            'updated_at_helper'               => ' ',
            'deleted_at'                      => 'Deleted at',
            'deleted_at_helper'               => ' ',
        ],
    ],
    'ad'                        => [
        'title'          => 'Ads',
        'title_singular' => 'Ad',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'name'                  => 'Name',
            'name_helper'           => ' ',
            'ads_location'          => 'Ads Location',
            'ads_location_helper'   => ' ',
            'categories'            => 'Categories',
            'categories_helper'     => ' ',
            'sub_categories'        => 'Sub Categories',
            'sub_categories_helper' => ' ',
            'product'               => 'Product',
            'product_helper'        => ' ',
            'services'              => 'Services',
            'services_helper'       => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'slider'                    => [
        'title'          => 'Slider',
        'title_singular' => 'Slider',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'image'             => 'Image',
            'image_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'userMenu'                  => [
        'title'          => 'User',
        'title_singular' => 'User',
    ],
    'servicesForUser'           => [
        'title'          => 'Services',
        'title_singular' => 'Service',
    ],
    'productsForUser'           => [
        'title'          => 'Products',
        'title_singular' => 'Product',
    ],
    'massageBoxForModerator'    => [
        'title'          => 'Massage Box',
        'title_singular' => 'Massage Box',
    ],
    'massageBoxForUser'         => [
        'title'          => 'Massage Box',
        'title_singular' => 'Massage Box',
    ],
    'profileForModerator'       => [
        'title'          => 'Profile',
        'title_singular' => 'Profile',
    ],
    'profileForUser'            => [
        'title'          => 'Profile',
        'title_singular' => 'Profile',
    ],
    'website'                   => [
        'title'          => 'Website',
        'title_singular' => 'Website',
    ],
    'topNavigation'             => [
        'title'          => 'Top Navigation',
        'title_singular' => 'Top Navigation',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'parent'            => 'Parent',
            'parent_helper'     => ' ',
            'type'              => 'Type',
            'type_helper'       => ' ',
        ],
    ],
    'highlightedCategory'       => [
        'title'          => 'Highlighted Categories',
        'title_singular' => 'Highlighted Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'categories'        => 'Categories',
            'categories_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'highlightedSubCategory'    => [
        'title'          => 'Highlighted Sub Categories',
        'title_singular' => 'Highlighted Sub Category',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'sub_categories'        => 'Sub Categories',
            'sub_categories_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'category'              => 'Category',
            'category_helper'       => ' ',
        ],
    ],
    'clientReview'              => [
        'title'          => 'Client Review',
        'title_singular' => 'Client Review',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'photo'             => 'Photo',
            'photo_helper'      => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'job_post'          => 'Job Post',
            'job_post_helper'   => ' ',
            'company'           => 'Company',
            'company_helper'    => ' ',
            'comment'           => 'Comment',
            'comment_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'article'                   => [
        'title'          => 'Articles',
        'title_singular' => 'Article',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'title_long'        => 'Title Long',
            'title_long_helper' => ' ',
            'content'           => 'Content',
            'content_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
            'tags'              => 'Tags',
            'tags_helper'       => ' ',
        ],
    ],
    'articleTag'                => [
        'title'          => 'Article Tags',
        'title_singular' => 'Article Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'websiteSetting'            => [
        'title'          => 'Website Settings',
        'title_singular' => 'Website Setting',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'name'                => 'Name',
            'name_helper'         => ' ',
            'value'               => 'Value',
            'value_helper'        => ' ',
            'display_type'        => 'Display Type',
            'display_type_helper' => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'store_type'          => 'Store Type',
            'store_type_helper'   => ' ',
        ],
    ],
    'categoriesForAdmin'        => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'img'                => 'Category Image',
            'img_helper'         => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'created_by'         => 'Created By',
            'created_by_helper'  => ' ',
        ],
    ],
    'subCategoryForAdmin'       => [
        'title'          => 'Sub Category',
        'title_singular' => 'Sub Category',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'name'                      => 'Name',
            'name_helper'               => ' ',
            'parent_category'           => 'Parent Category',
            'parent_category_helper'    => ' ',
            'description'               => 'Description',
            'description_helper'        => ' ',
            'sub_category_image'        => 'Sub Category Image',
            'sub_category_image_helper' => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'created_by'                => 'Created By',
            'created_by_helper'         => ' ',
        ],
    ],
    'productForVendor'          => [
        'title'          => 'Product',
        'title_singular' => 'Product',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'name'                 => 'Name',
            'name_helper'          => ' ',
            'category'             => 'Category',
            'category_helper'      => ' ',
            'sub_category'         => 'Sub Category',
            'sub_category_helper'  => ' ',
            'description'          => 'Description',
            'description_helper'   => ' ',
            'imagaes'              => 'Images',
            'imagaes_helper'       => ' ',
            'videos'               => 'Videos',
            'videos_helper'        => ' ',
            'approved_by'          => 'Approved By',
            'approved_by_helper'   => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'created_by'           => 'Created By',
            'created_by_helper'    => ' ',
            'price_start'          => 'Price Start',
            'price_start_helper'   => ' ',
            'price_max'            => 'Price Max',
            'price_max_helper'     => ' ',
            'tax_included'         => 'Tax Included',
            'tax_included_helper'  => ' ',
            'tax_rate'             => 'Tax Rate',
            'tax_rate_helper'      => ' ',
            'tags'                 => 'Tags',
            'tags_helper'          => ' ',
            'shipping_cost'        => 'Shipping Cost',
            'shipping_cost_helper' => ' ',
        ],
    ],
    'vendor'                    => [
        'title'          => 'Vendor',
        'title_singular' => 'Vendor',
    ],
    'serviceForVendor'          => [
        'title'          => 'Service',
        'title_singular' => 'Service',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'name'                 => 'Name',
            'name_helper'          => ' ',
            'description'          => 'Description',
            'description_helper'   => ' ',
            'images'               => 'Images',
            'images_helper'        => ' ',
            'videos'               => 'Videos',
            'videos_helper'        => ' ',
            'category'             => 'Category',
            'category_helper'      => ' ',
            'sub_category'         => 'Sub Category',
            'sub_category_helper'  => ' ',
            'approved_by'          => 'Approved By',
            'approved_by_helper'   => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'created_by'           => 'Created By',
            'created_by_helper'    => ' ',
            'price_start'          => 'Price Start',
            'price_start_helper'   => ' ',
            'price_max'            => 'Price Max',
            'price_max_helper'     => ' ',
            'shipping_cost'        => 'Shipping Cost',
            'shipping_cost_helper' => ' ',
            'tax_included'         => 'Tax Included',
            'tax_included_helper'  => ' ',
            'tax_rate'             => 'Tax Rate',
            'tax_rate_helper'      => ' ',
            'tags'                 => 'Tags',
            'tags_helper'          => ' ',
        ],
    ],
    'pProductListingForVendor'  => [
        'title'          => 'Premium Product Listing',
        'title_singular' => 'Premium Product Listing',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'product'           => 'Product',
            'product_helper'    => ' ',
            'expire_on'         => 'Expire On',
            'expire_on_helper'  => ' ',
            'start_from'        => 'Start From',
            'start_from_helper' => ' ',
            'active'            => 'Active',
            'active_helper'     => ' ',
            'plan'              => 'Plan',
            'plan_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
        ],
    ],
    'pServiceListingForVendor'  => [
        'title'          => 'Premium Service Listing',
        'title_singular' => 'Premium Service Listing',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'service'           => 'Service',
            'service_helper'    => ' ',
            'expire_on'         => 'Expire On',
            'expire_on_helper'  => ' ',
            'start_from'        => 'Start From',
            'start_from_helper' => ' ',
            'active'            => 'Active',
            'active_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'plan'              => 'Plan',
            'plan_helper'       => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
        ],
    ],
    'permissionGroupForAdmin'   => [
        'title'          => 'Permission Groups',
        'title_singular' => 'Permission Group',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'feedbackForAdmin'          => [
        'title'          => 'Feedback',
        'title_singular' => 'Feedback',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'ref_products'        => 'Ref Products',
            'ref_products_helper' => ' ',
            'ref_services'        => 'Ref Services',
            'ref_services_helper' => ' ',
            'name'                => 'Name',
            'name_helper'         => ' ',
            'email'               => 'Email',
            'email_helper'        => ' ',
            'company'             => 'Company',
            'company_helper'      => ' ',
            'content'             => 'Content',
            'content_helper'      => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'queryFromWebsiteForAdmin'  => [
        'title'          => 'Query',
        'title_singular' => 'Query',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'ref_products'          => 'Ref Products',
            'ref_products_helper'   => ' ',
            'ref_services'          => 'Ref Services',
            'ref_services_helper'   => ' ',
            'name'                  => 'Name',
            'name_helper'           => ' ',
            'email'                 => 'Email',
            'email_helper'          => ' ',
            'company'               => 'Company',
            'company_helper'        => ' ',
            'content'               => 'Content',
            'content_helper'        => ' ',
            'contact_no'            => 'Contact No',
            'contact_no_helper'     => ' ',
            'current_status'        => 'Current Status',
            'current_status_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'pToApproveForModerator'    => [
        'title'          => 'Product To Approve',
        'title_singular' => 'Product To Approve',
    ],
    'sToApproveForModerator'    => [
        'title'          => 'Service To Approve',
        'title_singular' => 'Service To Approve',
    ],
    'moderatorForModerator'     => [
        'title'          => 'Moderator',
        'title_singular' => 'Moderator',
    ],
    'toApproveVendorForAdmin'   => [
        'title'          => 'Vendor To Approve',
        'title_singular' => 'Vendor To Approve',
    ],
    'paymentGatewayForAdmin'    => [
        'title'          => 'Payment Gateway',
        'title_singular' => 'Payment Gateway',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'image'                    => 'Image',
            'image_helper'             => ' ',
            'creditinals_title'        => 'Creditinals Title',
            'creditinals_title_helper' => ' ',
            'creditinals_value'        => 'Creditinals Value',
            'creditinals_value_helper' => ' ',
            'description'              => 'Description',
            'description_helper'       => ' ',
            'mode'                     => 'Mode',
            'mode_helper'              => ' ',
        ],
    ],
    'emailSettingsForAdmin'     => [
        'title'          => 'Email Settings',
        'title_singular' => 'Email Setting',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'name'                => 'Name',
            'name_helper'         => ' ',
            'value'               => 'Value',
            'value_helper'        => ' ',
            'display_type'        => 'Display Type',
            'display_type_helper' => ' ',
            'store_type'          => 'Store Type',
            'store_type_helper'   => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'messageBoxForVendor'       => [
        'title'          => 'Message Box',
        'title_singular' => 'Message Box',
    ],
    'profileForVendor'          => [
        'title'          => 'Profile',
        'title_singular' => 'Profile',
    ],
    'highlightedCitiesForAdmin' => [
        'title'          => 'Highlighted Cities',
        'title_singular' => 'Highlighted City',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'name'                    => 'Name',
            'name_helper'             => ' ',
            'decription'              => 'Decription',
            'decription_helper'       => ' ',
            'image'                   => 'Image',
            'image_helper'            => ' ',
            'digital_location'        => 'Digital Location',
            'digital_location_helper' => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'paymentForAdmin'           => [
        'title'          => 'Payments',
        'title_singular' => 'Payment',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'method'             => 'Method',
            'method_helper'      => ' ',
            'user'               => 'User',
            'user_helper'        => ' ',
            'amount'             => 'Amount',
            'amount_helper'      => ' ',
            'plan'               => 'Plan',
            'plan_helper'        => ' ',
            'ref_product'        => 'Ref Product',
            'ref_product_helper' => ' ',
            'ref_service'        => 'Ref Service',
            'ref_service_helper' => ' ',
            'approved_by'        => 'Approved By',
            'approved_by_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
];
