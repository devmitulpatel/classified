<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class PremiumServiceListing extends Model
{
    use SoftDeletes, MultiTenantModelTrait, HasFactory;

    public $table = 'premium_service_listings';

    const ACTIVE_RADIO = [
        '1' => 'on',
        '0' => 'off',
    ];

    protected $dates = [
        'expire_on',
        'start_from',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'service_id',
        'expire_on',
        'start_from',
        'active',
        'created_at',
        'plan_id',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function getExpireOnAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setExpireOnAttribute($value)
    {
        $this->attributes['expire_on'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getStartFromAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartFromAttribute($value)
    {
        $this->attributes['start_from'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
