<?php


namespace App\Traits;


trait  ControllerTrait
{


    private function makeArrayForJson($data,$result=true,$status=200){

        $extraData=[];
        if(is_array($data) && array_key_exists('data',$data) &&  is_array($data['data']))$extraData=$data['data'];
        return  [
            'ResponseStatus'=>$status,
            'ResponseMessage'=>$data,
            'ResponseResult'=>$result,
            'ResponseData'=>$extraData
        ];
    }

    private function json($msg,$status=200){
        $data=(is_array($msg))?$msg:[$msg];
        $final=$this->makeArrayForJson($data);
        return response()->json($final,$status);


    }

    private function jsonError($msg,$status=413){
        $data=(is_array($msg))?$msg:[$msg];
        $final=$this->makeArrayForJson($data);

        return response()->json($final,$status);
    }

}
