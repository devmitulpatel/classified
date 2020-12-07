<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Categories
    Route::post('categories/media', 'CategoriesApiController@storeMedia')->name('categories.storeMedia');
    Route::apiResource('categories', 'CategoriesApiController');

    // Sub Categories
    Route::post('sub-categories/media', 'SubCategoryApiController@storeMedia')->name('sub-categories.storeMedia');
    Route::apiResource('sub-categories', 'SubCategoryApiController');

    // Products
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');

    // Services
    Route::post('services/media', 'ServicesApiController@storeMedia')->name('services.storeMedia');
    Route::apiResource('services', 'ServicesApiController');

    // Premium Product Listings
    Route::apiResource('premium-product-listings', 'PremiumProductListingApiController');

    // Premium Service Listings
    Route::apiResource('premium-service-listings', 'PremiumServiceListingApiController');

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
});
