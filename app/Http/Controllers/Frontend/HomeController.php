<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->wesite_settings=WebsiteSetting::all()->pluck('value','name')->toArray();

        //$this->middleware('auth');
        $this->title=(array_key_exists('website_header_title', $this->wesite_settings))?$this->wesite_settings['website_header_title']:"Title Not Configured";
    }


    public function user_profile(){

        return view('front.Pages.user_profile',['title'=>"User Profile"]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {

        $title=$this->title;

        return view('front.Pages.landing',['title'=>$title]);
    }


    public function vendor_dashboard(){
        $title=$this->title;

        return view('front.Pages.vendor_dashboard',['title'=>$title]);
    }
    public function user_dashboard(){
        $title=$this->title;

        return view('front.Pages.user_dashboard',['title'=>$title]);
    }
}
