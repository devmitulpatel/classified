<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \DateTimeInterface;

class MessageBox extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, InteractsWithMedia, HasFactory;

    public $table = 'message_boxes';

    protected $appends = [
        'files',
    ];

    const READ_STATUS_RADIO = [
        '0' => 'read',
        '1' => 'unread',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const DELIVER_STATUS_RADIO = [
        '1' => 'Delivered',
        '0' => 'Not Yet Delivered',
    ];

    protected $fillable = [
        'users_id',
        'from_id',
        'message',
        'read_status',
        'deliver_status',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function from()
    {
        return $this->belongsTo(User::class, 'from_id');
    }

    public function getFilesAttribute()
    {
        return $this->getMedia('files');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
