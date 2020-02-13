<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class DigitalBrochure extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    protected $appends = [
        'pdf',
        'digitalphoto',
    ];

    public $table = 'digital_brochures';

    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'published_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
        $this->addMediaConversion('medium')->width(200)->height(280);
    }

    public function getPdfAttribute()
    {
        return $this->getMedia('pdf')->last();
    }

     public function getdigitalphotoAttribute()
    {
        $file = $this->getMedia('digitalphoto')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail       = $file->getUrl('thumb');
            $file->medium = $file->getUrl('medium');
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
