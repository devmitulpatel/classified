<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LargeFileMediaLibrary extends Model
{
    use HasFactory;
    protected $table='large_file_media_library';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'file_id',
        'part',
        'raw_data',
        'total_part',
        'model',
        'collection',
        'final_path',
        'created_at',
        'updated_at',
        'deleted_at',
        'file_ext',
        'file_name',

    ];
}
