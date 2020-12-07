<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::post('categories/media', 'CategoriesController@storeMedia')->name('categories.storeMedia');
    Route::post('categories/ckmedia', 'CategoriesController@storeCKEditorImages')->name('categories.storeCKEditorImages');
    Route::resource('categories', 'CategoriesController');

    // Sub Categories
    Route::delete('sub-categories/destroy', 'SubCategoryController@massDestroy')->name('sub-categories.massDestroy');
    Route::post('sub-categories/media', 'SubCategoryController@storeMedia')->name('sub-categories.storeMedia');
    Route::post('sub-categories/ckmedia', 'SubCategoryController@storeCKEditorImages')->name('sub-categories.storeCKEditorImages');
    Route::resource('sub-categories', 'SubCategoryController');

    // Products
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Services
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::post('services/media', 'ServicesController@storeMedia')->name('services.storeMedia');
    Route::post('services/ckmedia', 'ServicesController@storeCKEditorImages')->name('services.storeCKEditorImages');
    Route::resource('services', 'ServicesController');

    // Premium Product Listings
    Route::delete('premium-product-listings/destroy', 'PremiumProductListingController@massDestroy')->name('premium-product-listings.massDestroy');
    Route::resource('premium-product-listings', 'PremiumProductListingController');

    // Premium Service Listings
    Route::delete('premium-service-listings/destroy', 'PremiumServiceListingController@massDestroy')->name('premium-service-listings.massDestroy');
    Route::resource('premium-service-listings', 'PremiumServiceListingController');

    // Message Boxes
    Route::delete('message-boxes/destroy', 'MessageBoxController@massDestroy')->name('message-boxes.massDestroy');
    Route::post('message-boxes/media', 'MessageBoxController@storeMedia')->name('message-boxes.storeMedia');
    Route::post('message-boxes/ckmedia', 'MessageBoxController@storeCKEditorImages')->name('message-boxes.storeCKEditorImages');
    Route::resource('message-boxes', 'MessageBoxController');

    // Plans
    Route::delete('plans/destroy', 'PlansController@massDestroy')->name('plans.massDestroy');
    Route::resource('plans', 'PlansController');

    // Ads
    Route::delete('ads/destroy', 'AdsController@massDestroy')->name('ads.massDestroy');
    Route::resource('ads', 'AdsController');

    // Payment Gateway Configurations
    Route::resource('payment-gateway-configurations', 'PaymentGatewayConfigurationController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Email Configurations
    Route::resource('email-configurations', 'EmailConfigurationController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Sliders
    Route::delete('sliders/destroy', 'SliderController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SliderController@storeMedia')->name('sliders.storeMedia');
    Route::post('sliders/ckmedia', 'SliderController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::resource('sliders', 'SliderController');

    // Service To Approves
    Route::resource('service-to-approves', 'ServiceToApproveController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Services For Users
    Route::resource('services-for-users', 'ServicesForUserController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Products For Users
    Route::resource('products-for-users', 'ProductsForUsersController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Massage Box For Moderators
    Route::resource('massage-box-for-moderators', 'MassageBoxForModeratorController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Massage Box For Users
    Route::resource('massage-box-for-users', 'MassageBoxForUserController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Profile For Moderators
    Route::resource('profile-for-moderators', 'ProfileForModeratorController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Profile For Users
    Route::resource('profile-for-users', 'ProfileForUserController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Product To Approves
    Route::resource('product-to-approves', 'ProductToApproveController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Top Navigations
    Route::delete('top-navigations/destroy', 'TopNavigationController@massDestroy')->name('top-navigations.massDestroy');
    Route::resource('top-navigations', 'TopNavigationController');

    // Highlighted Categories
    Route::delete('highlighted-categories/destroy', 'HighlightedCategoriesController@massDestroy')->name('highlighted-categories.massDestroy');
    Route::resource('highlighted-categories', 'HighlightedCategoriesController');

    // Highlighted Sub Categories
    Route::delete('highlighted-sub-categories/destroy', 'HighlightedSubCategoriesController@massDestroy')->name('highlighted-sub-categories.massDestroy');
    Route::resource('highlighted-sub-categories', 'HighlightedSubCategoriesController');

    // Client Reviews
    Route::delete('client-reviews/destroy', 'ClientReviewController@massDestroy')->name('client-reviews.massDestroy');
    Route::post('client-reviews/media', 'ClientReviewController@storeMedia')->name('client-reviews.storeMedia');
    Route::post('client-reviews/ckmedia', 'ClientReviewController@storeCKEditorImages')->name('client-reviews.storeCKEditorImages');
    Route::resource('client-reviews', 'ClientReviewController');

    // Articles
    Route::delete('articles/destroy', 'ArticlesController@massDestroy')->name('articles.massDestroy');
    Route::post('articles/media', 'ArticlesController@storeMedia')->name('articles.storeMedia');
    Route::post('articles/ckmedia', 'ArticlesController@storeCKEditorImages')->name('articles.storeCKEditorImages');
    Route::resource('articles', 'ArticlesController');

    // Article Tags
    Route::delete('article-tags/destroy', 'ArticleTagsController@massDestroy')->name('article-tags.massDestroy');
    Route::resource('article-tags', 'ArticleTagsController');

    // Website Settings
    Route::delete('website-settings/destroy', 'WebsiteSettingsController@massDestroy')->name('website-settings.massDestroy');
    Route::resource('website-settings', 'WebsiteSettingsController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
