<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class ExhibitionPost extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'exhibition_posts';

    protected $appends = [
        'feature_image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'content',
        'created_at',
        'updated_at',
        'deleted_at',
        'exhibition_category_id',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function exhibition_category()
    {
        return $this->belongsTo(ExhibationCategory::class, 'exhibition_category_id');
    }

    public function getFeatureImageAttribute()
    {
        return $this->getMedia('feature_image')->last();
    }
}