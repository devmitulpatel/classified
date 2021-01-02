<?php

namespace App\Providers;

use App\Models\WebsiteSetting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $max_file_size=WebsiteSetting::where('name','website_max_file_upload_size')->first();
        $max_file_size=$max_file_size??10;
        $max_file_size=(1024 * 1024) * $max_file_size['value'];
        config('media-library.max_file_size',$max_file_size);
        define('USER_ROLE', 2);
        define('ADMIN_ROLE', 1);
        define('MODERATOR_ROLE', 3);
        define('VENDOR_ROLE', 1);

    }
}
