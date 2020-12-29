<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginFormForModerator()
    {
        $type="Moderator";
        return view('auth.login',compact(['type']));
    }


    public function loggedOut(Request $request)
    {


        $input=$request->only(['for']);
        if(array_key_exists('for',$input)){
            $role=strtolower((is_array($input['for']))?reset($input['for']):$input['for']);

            switch (strtolower($role)){
                case 'admin':
                    return redirect('/admin');
                    break;

                case 'moderator':
                   // dd($input);
                    return redirect('/moderator');
                    break;
            }
        }


    }

    protected function authenticated(Request $request, $user)
    {
        $input=$request->only(['for']);
        if(array_key_exists('for',$input)){
            switch (strtolower($input['for'])){
                case 'admin':
                    //dd($input['for']);
                    if('admin'!=strtolower($user->roles->first()->toArray()['title'])){

                        return $this->logout($request);

                    }

                    break;

                    case 'moderator':
                    //dd($input['for']);
                    if('moderator'!=strtolower($user->roles->first()->toArray()['title'])){
                    dd(strtolower($user->roles->first()->toArray()['title']));
                        return $this->logout($request);

                    }
                        break;
                    default:
                    return $this->logout($request);

                    break;
            }
        }


    }

}
