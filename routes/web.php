<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class,'home'])->name('home');

Route::prefix('vendor')->group(function (){
    Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class,'vendor_dashboard'])->name('vendor_dashboard');
});

Route::prefix('user')->group(function (){
    Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class,'user_dashboard'])->name('user_dashboard');
    Route::get('/profile', [\App\Http\Controllers\Frontend\HomeController::class,'user_profile'])->name('user_profile');
});

Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class,'home'])->name('home');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

//////Backend

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

    // Sliders
    Route::delete('sliders/destroy', 'SliderController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SliderController@storeMedia')->name('sliders.storeMedia');
    Route::post('sliders/ckmedia', 'SliderController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::resource('sliders', 'SliderController');

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

    // Categories For Admins
    Route::delete('categories-for-admins/destroy', 'CategoriesForAdminController@massDestroy')->name('categories-for-admins.massDestroy');
    Route::post('categories-for-admins/media', 'CategoriesForAdminController@storeMedia')->name('categories-for-admins.storeMedia');
    Route::post('categories-for-admins/ckmedia', 'CategoriesForAdminController@storeCKEditorImages')->name('categories-for-admins.storeCKEditorImages');
    Route::resource('categories-for-admins', 'CategoriesForAdminController');

    // Sub Category For Admins
    Route::delete('sub-category-for-admins/destroy', 'SubCategoryForAdminController@massDestroy')->name('sub-category-for-admins.massDestroy');
    Route::post('sub-category-for-admins/media', 'SubCategoryForAdminController@storeMedia')->name('sub-category-for-admins.storeMedia');
    Route::post('sub-category-for-admins/ckmedia', 'SubCategoryForAdminController@storeCKEditorImages')->name('sub-category-for-admins.storeCKEditorImages');
    Route::resource('sub-category-for-admins', 'SubCategoryForAdminController');

    // Product For Vendors
    Route::delete('product-for-vendors/destroy', 'ProductForVendorController@massDestroy')->name('product-for-vendors.massDestroy');
    Route::post('product-for-vendors/media', 'ProductForVendorController@storeMedia')->name('product-for-vendors.storeMedia');
    Route::post('product-for-vendors/ckmedia', 'ProductForVendorController@storeCKEditorImages')->name('product-for-vendors.storeCKEditorImages');
    Route::resource('product-for-vendors', 'ProductForVendorController');

    // Service For Vendors
    Route::delete('service-for-vendors/destroy', 'ServiceForVendorController@massDestroy')->name('service-for-vendors.massDestroy');
    Route::post('service-for-vendors/media', 'ServiceForVendorController@storeMedia')->name('service-for-vendors.storeMedia');
    Route::post('service-for-vendors/ckmedia', 'ServiceForVendorController@storeCKEditorImages')->name('service-for-vendors.storeCKEditorImages');
    Route::resource('service-for-vendors', 'ServiceForVendorController');

    // P Product Listing For Vendors
    Route::delete('p-product-listing-for-vendors/destroy', 'PProductListingForVendorController@massDestroy')->name('p-product-listing-for-vendors.massDestroy');
    Route::resource('p-product-listing-for-vendors', 'PProductListingForVendorController');

    // P Service Listing For Vendors
    Route::delete('p-service-listing-for-vendors/destroy', 'PServiceListingForVendorController@massDestroy')->name('p-service-listing-for-vendors.massDestroy');
    Route::resource('p-service-listing-for-vendors', 'PServiceListingForVendorController');

    // Permission Group For Admins
    Route::delete('permission-group-for-admins/destroy', 'PermissionGroupForAdminController@massDestroy')->name('permission-group-for-admins.massDestroy');
    Route::resource('permission-group-for-admins', 'PermissionGroupForAdminController');

    // Feedback For Admins
    Route::delete('feedback-for-admins/destroy', 'FeedbackForAdminController@massDestroy')->name('feedback-for-admins.massDestroy');
    Route::post('feedback-for-admins/media', 'FeedbackForAdminController@storeMedia')->name('feedback-for-admins.storeMedia');
    Route::post('feedback-for-admins/ckmedia', 'FeedbackForAdminController@storeCKEditorImages')->name('feedback-for-admins.storeCKEditorImages');
    Route::resource('feedback-for-admins', 'FeedbackForAdminController');

    // Query From Website For Admins
    Route::delete('query-from-website-for-admins/destroy', 'QueryFromWebsiteForAdminController@massDestroy')->name('query-from-website-for-admins.massDestroy');
    Route::post('query-from-website-for-admins/media', 'QueryFromWebsiteForAdminController@storeMedia')->name('query-from-website-for-admins.storeMedia');
    Route::post('query-from-website-for-admins/ckmedia', 'QueryFromWebsiteForAdminController@storeCKEditorImages')->name('query-from-website-for-admins.storeCKEditorImages');
    Route::resource('query-from-website-for-admins', 'QueryFromWebsiteForAdminController');

    // P To Approve For Moderators
    Route::resource('p-to-approve-for-moderators', 'PToApproveForModeratorController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // S To Approve For Moderators
    Route::resource('s-to-approve-for-moderators', 'SToApproveForModeratorController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // To Approve Vendor For Admins
    Route::resource('to-approve-vendor-for-admins', 'ToApproveVendorForAdminController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Payment Gateway For Admins
    Route::post('payment-gateway-for-admins/media', 'PaymentGatewayForAdminController@storeMedia')->name('payment-gateway-for-admins.storeMedia');
    Route::post('payment-gateway-for-admins/ckmedia', 'PaymentGatewayForAdminController@storeCKEditorImages')->name('payment-gateway-for-admins.storeCKEditorImages');
    Route::resource('payment-gateway-for-admins', 'PaymentGatewayForAdminController', ['except' => ['create', 'store', 'destroy']]);

    // Email Settings For Admins
    Route::resource('email-settings-for-admins', 'EmailSettingsForAdminController', ['except' => ['create', 'store', 'destroy']]);

    // Message Box For Vendors
    Route::resource('message-box-for-vendors', 'MessageBoxForVendorController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Profile For Vendors
    Route::resource('profile-for-vendors', 'ProfileForVendorController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Highlighted Cities For Admins
    Route::delete('highlighted-cities-for-admins/destroy', 'HighlightedCitiesForAdminController@massDestroy')->name('highlighted-cities-for-admins.massDestroy');
    Route::post('highlighted-cities-for-admins/media', 'HighlightedCitiesForAdminController@storeMedia')->name('highlighted-cities-for-admins.storeMedia');
    Route::post('highlighted-cities-for-admins/ckmedia', 'HighlightedCitiesForAdminController@storeCKEditorImages')->name('highlighted-cities-for-admins.storeCKEditorImages');
    Route::resource('highlighted-cities-for-admins', 'HighlightedCitiesForAdminController');

    // Payment For Admins
    Route::delete('payment-for-admins/destroy', 'PaymentForAdminController@massDestroy')->name('payment-for-admins.massDestroy');
    Route::resource('payment-for-admins', 'PaymentForAdminController');
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
