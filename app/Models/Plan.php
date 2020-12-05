<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Plan extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'plans';

    const YEARLY_ACTIVE_RADIO = [
        '1' => 'on',
        '0' => 'off',
    ];

    const MONTHLY_ACTIVE_RADIO = [
        '1' => 'on',
        '0' => 'off',
    ];

    const HALF_YEAR_ACTIVE_RADIO = [
        '1' => 'on',
        '0' => 'off',
    ];

    const LIFE_TIME_ACTIVE_RADIO = [
        '1' => 'on',
        '0' => 'off',
    ];

    const TWO_YEAR_BUNDLE_ACTIVE_RADIO = [
        '1' => 'on',
        '2' => 'off',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const THREE_YEAR_BUNDLE_ACTIVE_RADIO = [
        '1' => 'on',
        '0' => 'off',
    ];

    protected $fillable = [
        'name',
        'monthly_active',
        'monthly_cost',
        'half_year_active',
        'half_yearly_cost',
        'yearly_active',
        'yearly_cost',
        'two_year_bundle_active',
        'two_year_bundle_cost',
        'three_year_bundle_active',
        'three_year_bundle_cost',
        'life_time_active',
        'life_time_cost',
        'currency',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
