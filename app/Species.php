<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Species extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'species';

    protected $appends = [
        'image',
    ];
    const TYPE_SELECT = [
        'MARINE'      => 'marine',
        'TERRESTRIAL' => 'terrestrial',
    ];

    protected $dates = [
        'published_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'type',
        'published_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(100)->height(100);
    }

    public function speciesNgos()
    {
        return $this->belongsToMany(Ngo::class);
    }

   public function getPublishedAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    /**
     * Get the Ngo Price for Ngo Post.
     */
    public function prices()
    {
        return $this->hasMany('App\NgoPrice','specie_id');
    }
}
