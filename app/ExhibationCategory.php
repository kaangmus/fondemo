<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Spatie\MediaLibrary\HasMedia\HasMedia;
    use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
    use Spatie\MediaLibrary\Models\Media;

    class ExhibationCategory extends Model implements HasMedia
    {
        use SoftDeletes, HasMediaTrait;

        public $table = 'exhibation_categories';

        protected $appends = [
            'e_cat_video',
            'e_cat_post_video',
        ];

        protected $dates = [
            'created_at',
            'updated_at',
            'deleted_at',
        ];

        const TYPE_SELECT = [
            'epost'    => 'Post',
            'evideo'   => 'Video',
            'egallery' => 'Gallery',
        ];

        protected $fillable = [
            'type',
            'title',
            'year_id',
            'created_at',
            'updated_at',
            'deleted_at',
            'description',
            'public_date',
            'e_cat_post_description',
        ];

        public function registerMediaConversions(Media $media = null)
        {
            $this->addMediaConversion('thumb')->width(50)->height(50);
        }

        public function exhibitionCategoryExhibitionPosts()
        {
            return $this->hasMany(ExhibitionPost::class, 'exhibition_category_id', 'id');
        }

        public function exhibitionCategoryExhibitionGalleries()
        {
            return $this->hasOne(ExhibitionGallery::class, 'exhibition_category_id', 'id');
        }

        public function year()
        {
            return $this->belongsTo(Year::class, 'year_id');
        }

        public function getECatVideoAttribute()
        {
            return $this->getMedia('e_cat_video')->last();
        }

        public function getECatPostVideoAttribute()
        {
            return $this->getMedia('e_cat_post_video')->last();
        }
    }