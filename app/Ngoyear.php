<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ngoyear extends Model
{
     public $table = 'ngo_year';

     protected $fillable = [
        'price',
        'ngo_id',
        'year_id',
        
    ];

        public function year()
    {
        return $this->belongsTo('App\Year');
    }
    /**
     * Get the Ngo that owns the Ngo.
     */
    public function ngo()
    {
        return $this->belongsTo('App\Ngo');
    }
}
