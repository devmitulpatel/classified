<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\File\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginPostFromFront;
use App\Http\Requests\RegisterFromFront;
use App\Models\User;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        if(auth()->check()){
           // dd(auth()->user()->roles->contains(2));

            if(auth()->user()->roles->contains(2))return redirect()->route('user_dashboard');

        }
        return view('front.Pages.vendor_dashboard',['title'=>$title]);
    }
    public function user_dashboard(){
        $title=$this->title;

        if(auth()->check()){
            if(auth()->user()->roles->contains(4))return redirect()->route('vendor_dashboard');

        }

        return view('front.Pages.user_dashboard',['title'=>$title]);
    }


    public function add_list(){
        $title=$this->title;

        return view('front.Pages.add_listing',['title'=>$title]);
    }

    public function loginPost(LoginPostFromFront  $r){
        $input=$r->validated();


        $token=$input['token'];


        $fb=new \App\Helper\File\FirebaseAuthenticator ($token);

        return ($fb->auth()) ? JsonResponse::data(['msg'=>'Logged in Successfully']):JsonResponse::error(['msg'=>'unable to login']);


    }

    public function logoutPost(){
        Auth::logout();
        return JsonResponse::data(['msg'=>'Logged out Successfully']);
    }


    public function registerPost(RegisterFromFront $r){

        $input=$r->validated();

        return User::create([
            'city'=>$input['city']['value'],
            'email'    => $input['username'],
            'password' => Hash::make($input['password']),
        ]);

    }

}
