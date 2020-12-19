<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class PaymentForAdmin extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'payment_for_admins';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'method_id',
        'user_id',
        'amount',
        'plan_id',
        'ref_service_id',
        'approved_by_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function method()
    {
        return $this->belongsTo(PaymentGatewayForAdmin::class, 'method_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function ref_products()
    {
        return $this->belongsToMany(ProductForVendor::class);
    }

    public function ref_service()
    {
        return $this->belongsTo(ServiceForVendor::class, 'ref_service_id');
    }

    public function approved_by()
    {
        return $this->belongsTo(User::class, 'approved_by_id');
    }
}
