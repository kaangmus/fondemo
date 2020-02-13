<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Year extends Model
{
    use SoftDeletes;

    public $table = 'years';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'year',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function yearngos()
    {
        return $this->belongsToMany(Ngo::class);
    }

    public function MediaUploads(){

        return $this->hasMany('App\MediaUpload'); 
    } 

     public function speciesbyyear(){

        return $this->hasMany('App\NgoPrice','year_id'); 
    } 

  

    /**
     * Get the Ngo Price for Ngo Post.
     */
    public function prices()
    {
        return $this->hasMany('App\NgoPrice','year_id');
    }
}
