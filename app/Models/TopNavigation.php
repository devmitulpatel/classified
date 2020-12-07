<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class TopNavigation extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'top_navigations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'parent_id',
        'type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TYPE_SELECT = [
        '1' => 'Type 1',
        '2' => 'Type 2',
        '3' => 'Type 3',
        '0' => 'select only if this is not parent menu',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function parent()
    {
        return $this->belongsTo(TopNavigation::class, 'parent_id');
    }
}
