<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Ad extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'ads';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const ADS_LOCATION_SELECT = [
        '1' => 'Top',
        '2' => 'Bottom',
        '3' => 'Left',
        '4' => 'Right',
    ];

    protected $fillable = [
        'name',
        'ads_location',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function sub_categories()
    {
        return $this->belongsToMany(SubCategory::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
