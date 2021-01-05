<?php

namespace Database\Seeders;

use App\Helper\File\JsonResponse;
use App\Models\User;
use Illuminate\Database\Seeder;
use Kreait\Laravel\Firebase\Facades\Firebase;

class ExtraUsersToTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::find(1)->update( [
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@test.com',
            'password'       => bcrypt('password'),
            'remember_token' => null,
            'city'           => '',
            'state'          => '',
            'country'        => '',
            'pincode'        => '',
            'area'           => '',
            'contact_no'     => '',
        ]);

        $users = [
            [
                'id'             => 2,
                'name'           => 'Moderator_1',
                'email'          => 'moderator_1@test.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'city'           => '',
                'state'          => '',
                'country'        => '',
                'pincode'        => '',
                'area'           => '',
                'contact_no'     => '',
            ],

            [
                'id'             => 3,
                'name'           => 'Moderator_2',
                'email'          => 'moderator_2@test.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'city'           => '',
                'state'          => '',
                'country'        => '',
                'pincode'        => '',
                'area'           => '',
                'contact_no'     => '',
            ],
            [
                'id'             => 4,
                'name'           => 'Vendor 1',
                'email'          => 'vendor_1@test.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'city'           => '',
                'state'          => '',
                'country'        => '',
                'pincode'        => '',
                'area'           => '',
                'contact_no'     => '',
            ],
            [
                'id'             => 5,
                'name'           => 'Vendor 2',
                'email'          => 'vendor_2@test.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'city'           => '',
                'state'          => '',
                'country'        => '',
                'pincode'        => '',
                'area'           => '',
                'contact_no'     => '',
            ],

            [
                'id'             => 6,
                'name'           => 'User 1',
                'email'          => 'user_1@test.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'city'           => '',
                'state'          => '',
                'country'        => '',
                'pincode'        => '',
                'area'           => '',
                'contact_no'     => '',
            ],
            [
                'id'             => 7,
                'name'           => 'User 2',
                'email'          => 'user_2@test.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'city'           => '',
                'state'          => '',
                'country'        => '',
                'pincode'        => '',
                'area'           => '',
                'contact_no'     => '',
            ],
        ];


      if(false)  for ($x=1;$x<50;$x++){
            $id=7+$x;
            $users[]= [
                'id'=>$id,
                'name'           => 'User '.$id,
                'email'          => 'user_'.$id.'@test.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'city'           => '',
                'state'          => '',
                'country'        => '',
                'pincode'        => '',
                'area'           => '',
                'contact_no'     => '',
            ];
        }

        $auth=Firebase::auth();

          foreach ($users as $u){
            if($u['id']>3){
                $userProperties = [
                    'email' => $u['email'],
                    'emailVerified' => false,
                    'password' => 'password',
                    'disabled' => false,
                ];




                try {
                    $foundUser=$auth->getUserByEmail($userProperties['email']);
                    $fUid=$foundUser->uid;
                    $auth->deleteUser($fUid);
                    goto FinallyCreateNewUser;
                }catch (\Kreait\Firebase\Exception\Auth\UserNotFound  $e){

                    FinallyCreateNewUser:
                    $userProperties = [
                        'email' => $u['email'],
                        'emailVerified' => false,
                        'password' => 'password',
                        'disabled' => false,
                    ];
                    try {
                        $createdUser = $auth->createUser($userProperties);
                    }catch (\Exception $e){

                    }
                }



            }
        }


        User::insert($users);

        if(false)foreach ($users as $u){
            if($u['id']>7) {
                User::findOrFail($u['id'])->roles()->sync(2);
            }

        }
    }
}
