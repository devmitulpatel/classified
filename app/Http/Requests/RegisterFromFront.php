<?php

namespace App\Http\Requests;

use App\Helper\File\RequestValidatorHelper;


class RegisterFromFront extends RequestValidatorHelper
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'username'=>['required','unique:users,email'],
            'city'=>['required'],
            'password'=>['required','required_with:password_confirmation|same:password_confirmation'],
            'confirm_password'=>['required']

        ];
    }
    public function attributes()
    {
        return [
            'username'=>'Email'
        ];

    }
}
