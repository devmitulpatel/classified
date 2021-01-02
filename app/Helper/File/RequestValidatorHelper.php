<?php


namespace App\Helper\File;


use App\Helper\File\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class RequestValidatorHelper extends FormRequest
{

    public  function failedValidation(Validator $validator)
    {

        throw new ValidationException($validator, JsonResponse::error(['msg'=>$validator->errors()])  );

    }

    public function failedAuthorization( )
    {

        throw new ValidationException($this, JsonResponse::error(['msg'=>'Access denied'],402));


    }

    public function all($keys=null)
    {
        return array_replace_recursive(
            parent::all(),
            $this->route()->parameters()
        );
    }
}
