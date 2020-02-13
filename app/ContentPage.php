<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class ContentPage extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'content_pages';

    protected $appends = [
        'video',
        'featured_image',
    ];

     const TYPE_SELECT = [
        'small'      => 'small',
        'medium' => 'medium',
        'large' => 'large',
    ];

    protected $dates = [
        'created_at',
        'published_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'excerpt',
        'type',
        'link',
        'page_text',
        'published_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
        $this->addMediaConversion('medium')->width(400)->height(300);
        $this->addMediaConversion('large')->width(800)->height(700);
    }

    public function categories()
    {
        return $this->belongsToMany(ContentCategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(ContentTag::class);
    }

    public function getFeaturedImageAttribute()
    {
        $file = $this->getMedia('featured_image')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->medium = $file->getUrl('medium');
            $file->medium = $file->getUrl('large');
        }

        return $file;
    }

    public function getVideoAttribute()
    {
        return $this->getMedia('video')->last();
    }

     public function getPublishedAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}