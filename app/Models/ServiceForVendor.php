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

class ServiceForVendor extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, InteractsWithMedia, HasFactory;

    public $table = 'service_for_vendors';

    protected $appends = [
        'images',
        'videos',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TAX_INCLUDED_SELECT = [
        '0' => 'Included',
        '1' => 'Excluded',
    ];

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'sub_category_id',
        'price_start',
        'price_max',
        'shipping_cost',
        'tax_included',
        'tax_rate',
        'approved_by_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
        'rejected',
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

    public function getImagesAttribute()
    {
        $files = $this->getMedia('images');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function getVideosAttribute()
    {
        return $this->getMedia('videos');
    }

    public function category()
    {
        return $this->belongsTo(CategoriesForAdmin::class, 'category_id');
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategoryForAdmin::class, 'sub_category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(ArticleTag::class);
    }

    public function approved_by()
    {
        return $this->belongsTo(User::class, 'approved_by_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
