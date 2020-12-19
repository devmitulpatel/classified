<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Message Boxes
    Route::post('message-boxes/media', 'MessageBoxApiController@storeMedia')->name('message-boxes.storeMedia');
    Route::apiResource('message-boxes', 'MessageBoxApiController');

    // Plans
    Route::apiResource('plans', 'PlansApiController');

    // Ads
    Route::apiResource('ads', 'AdsApiController');

    // Sliders
    Route::post('sliders/media', 'SliderApiController@storeMedia')->name('sliders.storeMedia');
    Route::apiResource('sliders', 'SliderApiController');

    // Top Navigations
    Route::apiResource('top-navigations', 'TopNavigationApiController');

    // Highlighted Categories
    Route::apiResource('highlighted-categories', 'HighlightedCategoriesApiController');

    // Highlighted Sub Categories
    Route::apiResource('highlighted-sub-categories', 'HighlightedSubCategoriesApiController');

    // Client Reviews
    Route::post('client-reviews/media', 'ClientReviewApiController@storeMedia')->name('client-reviews.storeMedia');
    Route::apiResource('client-reviews', 'ClientReviewApiController');

    // Articles
    Route::post('articles/media', 'ArticlesApiController@storeMedia')->name('articles.storeMedia');
    Route::apiResource('articles', 'ArticlesApiController');

    // Article Tags
    Route::apiResource('article-tags', 'ArticleTagsApiController');

    // Website Settings
    Route::apiResource('website-settings', 'WebsiteSettingsApiController');

    // Categories For Admins
    Route::post('categories-for-admins/media', 'CategoriesForAdminApiController@storeMedia')->name('categories-for-admins.storeMedia');
    Route::apiResource('categories-for-admins', 'CategoriesForAdminApiController');

    // Sub Category For Admins
    Route::post('sub-category-for-admins/media', 'SubCategoryForAdminApiController@storeMedia')->name('sub-category-for-admins.storeMedia');
    Route::apiResource('sub-category-for-admins', 'SubCategoryForAdminApiController');

    // Product For Vendors
    Route::post('product-for-vendors/media', 'ProductForVendorApiController@storeMedia')->name('product-for-vendors.storeMedia');
    Route::apiResource('product-for-vendors', 'ProductForVendorApiController');

    // Service For Vendors
    Route::post('service-for-vendors/media', 'ServiceForVendorApiController@storeMedia')->name('service-for-vendors.storeMedia');
    Route::apiResource('service-for-vendors', 'ServiceForVendorApiController');

    // P Product Listing For Vendors
    Route::apiResource('p-product-listing-for-vendors', 'PProductListingForVendorApiController');

    // P Service Listing For Vendors
    Route::apiResource('p-service-listing-for-vendors', 'PServiceListingForVendorApiController');

    // Permission Group For Admins
    Route::apiResource('permission-group-for-admins', 'PermissionGroupForAdminApiController');

    // Feedback For Admins
    Route::post('feedback-for-admins/media', 'FeedbackForAdminApiController@storeMedia')->name('feedback-for-admins.storeMedia');
    Route::apiResource('feedback-for-admins', 'FeedbackForAdminApiController');

    // Query From Website For Admins
    Route::post('query-from-website-for-admins/media', 'QueryFromWebsiteForAdminApiController@storeMedia')->name('query-from-website-for-admins.storeMedia');
    Route::apiResource('query-from-website-for-admins', 'QueryFromWebsiteForAdminApiController');

    // Payment Gateway For Admins
    Route::post('payment-gateway-for-admins/media', 'PaymentGatewayForAdminApiController@storeMedia')->name('payment-gateway-for-admins.storeMedia');
    Route::apiResource('payment-gateway-for-admins', 'PaymentGatewayForAdminApiController', ['except' => ['store', 'destroy']]);

    // Email Settings For Admins
    Route::apiResource('email-settings-for-admins', 'EmailSettingsForAdminApiController', ['except' => ['store', 'destroy']]);

    // Highlighted Cities For Admins
    Route::post('highlighted-cities-for-admins/media', 'HighlightedCitiesForAdminApiController@storeMedia')->name('highlighted-cities-for-admins.storeMedia');
    Route::apiResource('highlighted-cities-for-admins', 'HighlightedCitiesForAdminApiController');

    // Payment For Admins
    Route::apiResource('payment-for-admins', 'PaymentForAdminApiController');
});
