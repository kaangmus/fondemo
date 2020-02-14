<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NgoPrice extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'price',
        'ngo_id',
        'year_id',
        'specie_id',
    ];

    /**
     * Get the year that owns the Year.
     */
    public function specie()
    {
        return $this->belongsTo('App\Species');
    }
    /**
     * Get the year that owns the Year.
     */
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


    public function ngobyyearspec()
    {
        return $this->belongsTo('App\Ngo','year_id','specie_id');
    }

   
}
