<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use TypiCMS\NestableTrait;

class ProductCategory extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait,NestableTrait;

    protected $appends = [
        'photo',
    ];

    public $table = 'product_categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'slug',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function categoryProducts()
    {
        return $this->belongsToMany(Product::class);
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    /**
 * @return mixed
 */
   
   public function treeList()
   {
        return ProductCategory::orderByRaw('-name ASC')
        ->get()
        ->nest()
        ->listsFlattened('name');
         $categories = $this->categoryRepository->treeList();
        $categories = $this->categoryRepository->treeList();
        
   } 
  
}
