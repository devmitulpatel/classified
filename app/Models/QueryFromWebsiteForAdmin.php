<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \DateTimeInterface;

class QueryFromWebsiteForAdmin extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'query_from_website_for_admins';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'company',
        'content',
        'contact_no',
        'current_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const CURRENT_STATUS_SELECT = [
        '0' => 'Not Replayed Yet',
        '1' => 'Replay and Waiting For Answer',
        '2' => 'Answer Received Positive',
        '3' => 'Answer Received Negative',
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

    public function ref_products()
    {
        return $this->belongsToMany(ProductForVendor::class);
    }

    public function ref_services()
    {
        return $this->belongsToMany(ServiceForVendor::class);
    }
}
