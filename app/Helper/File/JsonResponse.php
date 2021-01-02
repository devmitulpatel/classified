<?php


namespace App\Helper\File;


class JsonResponse
{


    public static function data($data,$statusCode=200){
        $dataResponse=[];
        if(array_key_exists('data', $data)){
            $dataResponse=$data['data'];
            unset($data['data']);
        }
        $msgResponse="Action has taken successfully";
        if(array_key_exists('msg', $data)){
            if(is_array($data)){
                $msgResponse=$data['msg'];
            }else {
                $msgResponse=[$data['msg']];
            }
        }

        $dataFinal= [
            'ResponseStatus'=>$statusCode,
            'ResponseMessage'=>$msgResponse,
            'ResponseData'=>$dataResponse,
            'ResponseResult'=>true
        ];

        return response()->json($dataFinal,$statusCode);

    }

    public static function error($data,$statusCode=422){
        $dataResponse=[];
        if(array_key_exists('data', $data)){
            $dataResponse=$data['data'];
            unset($data['data']);
        }
        $msgResponse="Action has taken successfully";
        if(array_key_exists('msg', $data)){
            if(is_array($data)){
                $msgResponse=$data['msg'];
            }else {
                $msgResponse=[$data['msg']];
            }
        }

        $dataFinal= [
            'ResponseStatus'=>$statusCode,
            'ResponseMessage'=>$msgResponse,
            'ResponseData'=>$dataResponse,
            'ResponseResult'=>false
        ];
        return response()->json($dataFinal,$statusCode);
    }

}
