<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Podkategorije extends Model
{
    protected $fillable = [
        'naziv','kategorija_id'
    ];

    public function proizvodivels()
    {
        return $this->hasMany('App\Proizvodivel', 'podkategorija_id' , 'id');
    }
    public function proizvodimalos()
    {
        return $this->hasMany('App\Proizvodimalo', 'podkategorija_id' , 'id');
    }
    public function kategorije()
    {
        return $this->belongsTo('App\Kategorije','kategorija_id');
    }
}
