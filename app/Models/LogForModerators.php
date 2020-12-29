<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogForModerators extends Model
{
    use HasFactory;
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable=[
        'action_taken_by_id',
        'action_taken_on_id',
        'type',
        'action_type',
       // 'action_taken_on_vendor_id',
    ];

    protected $appends=['action_taken_on'];

    public function getActionTakenOnAttribute(){
        $model= ($this->type=="product")?new ProductForVendor():new ServiceForVendor();
        return $model->find($this->action_taken_on_id);
    }

}
