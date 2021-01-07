<?php


namespace App\Helper\File;


use App\Models\User;
use Kreait\Firebase\Auth;
use Illuminate\Support\Facades\Auth as BaseAuth;
use Kreait\Laravel\Firebase\Facades\Firebase;

class FirebaseAuthenticator
{

    public $userData=[],$errorData=[],$token=null,$tokenData=[];

    public function __construct($refreshToken){

            $this->auth = Firebase::auth();


            try {
                $uid=$this->auth->signInWithRefreshToken($refreshToken)->firebaseUserId();
            }catch (\Exception $e){
                $this->errorData[]=
                    [
                        'code'=>$e->getCode(),
                        'msg'=>$e->getMessage()
                    ];
            }


        //$customToken = $auth->createCustomToken($uid);
        try{

            if(isset($uid))$this->userData = json_decode(json_encode($this->auth->getUser($uid)),true);

        }catch (\Exception $e){
            $this->errorData[]=
                [
                    'code'=>$e->getCode(),
                    'msg'=>$e->getMessage()
                ];

        }

    }

    public function auth(){
            if(!array_key_exists('email', $this->userData))return false;
            $users=User::where('email',$this->userData['email'])->get();

            if($users->count()>0){
                $foundUserId=$users->first()->id;
                BaseAuth::loginUsingId($foundUserId, true);
                return true;

            }

            return false;
            dd($users->count());
    }


    public function user(){
            return $this->userData;
    }


}
