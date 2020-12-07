<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class WebsiteSetting extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'website_settings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'value',
        'display_type',
        'store_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STORE_TYPE_SELECT = [
        '0' => 'string',
        '1' => 'number',
        '2' => 'html',
        '3' => 'money',
        '4' => 'array',
        '5' => 'json',
        '6' => 'encoded',
        '7' => 'decoded',
    ];

    const DISPLAY_TYPE_SELECT = [
        '0' => 'string',
        '1' => 'number',
        '2' => 'html',
        '3' => 'money',
        '4' => 'array',
        '5' => 'json',
        '6' => 'encoded',
        '7' => 'decoded',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
