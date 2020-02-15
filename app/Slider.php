<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Slider extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'sliders';

    protected $appends = [
        'image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'publishedP_at',
    ];

    protected $fillable = [
        'title',
        'btn_text',
        'btn_link',
        'published_at',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',

    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->withResponsiveImages();
       $this->addMediaConversion('large')->width(1700)->height(850);
        $this->addMediaConversion('grayscale')
             ->greyscale()
            ->withResponsiveImages();
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->large = $file->getUrl('large');
        }

        return $file;
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
