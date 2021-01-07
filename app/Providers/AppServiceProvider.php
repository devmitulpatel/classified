<?php

namespace App\Providers;

use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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

    private function setupSetiings(){


        if(Schema::hasTable('website_settings')) {
            $allSettings=WebsiteSetting::all();

            $defaultD=[];
            foreach ($allSettings as $s){

                switch ($s->display_type){
                    case '0':
                        $defaultD[$s->name]=$s->value;
                        break;
                    case '8':
                        $defaultD[$s->name]=(bool)$s->value;
                        break;
                }


            }


            config()->set('default_var',$defaultD);

            $max_file_size = config('default_var.website_max_file_upload_size') ?? 10;
            $max_file_size = (1024 * 1024) * (is_array($max_file_size))?$max_file_size['value']:$max_file_size;
            config('media-library.max_file_size', $max_file_size);



        }
        define('USER_ROLE', 2);
        define('ADMIN_ROLE', 1);
        define('MODERATOR_ROLE', 3);
        define('VENDOR_ROLE', 4);

    }
    public function boot()
    {
        //

        $this->setupSetiings();
    }
}
