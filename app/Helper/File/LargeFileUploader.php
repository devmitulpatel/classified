<?php


namespace App\Helper\File;


use Illuminate\Support\Str;

class LargeFileUploader
{
    private
        $totalPart=[],
        $partUploaded=[],
        $uid="",
        $model="",
        $collection="",
        $file_max_size=0,
        $file_name='',
        $file_extension='',
        $file_size=0;


    public function __construct ($model,$collection,$id=0,$uid="",$part=1){
        $this->file_max_size=config('media-library.max_file_size');
        $this->model=$model;
        $this->collection=$collection;
        $this->id=$id;
        if(is_string($uid) && strlen($uid)<1 ){
            $this->uid=$this->genUUID();
        }
    }

    private function genUUID(){
        $UUID=Str::uuid()->toString();
        while($this->checkUUIDExist($UUID)){
            $UUID=Str::uuid()->toString();
        }
        return $UUID;

    }

    private function checkUUIDExist($UUID){
        return false;
    }



}
