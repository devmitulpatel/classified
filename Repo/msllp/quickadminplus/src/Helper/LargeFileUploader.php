<?php


namespace QAP\Helper;

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
        $totalPartCount=0,
        $file_size=0;


    public function __construct ($model,$collection,$filename,$id=0,$uid="",$totalPart=1){
        $this->file_max_size=config('media-library.max_file_size');
        $this->model=$model;
        $this->collection=$collection;
        $this->id=$id;
        $this->totalPartCount=$totalPart;

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

    public function merge(){

    }

    private function db_entry_on_part_get()
    {

    }
    private function db_entry_on_part_last()
    {

    }
    private function transferToMedaiLibray(){

    }
}
