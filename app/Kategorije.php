<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategorije extends Model
{
    protected $fillable = [
        'naziv',
    ];

    public function proizvodivels()
    {
        return $this->hasMany('App\Proizvodivel', 'kategorija_id' , 'id');
    }
    public function proizvodimalos()
    {
        return $this->hasMany('App\Proizvodimalo', 'kategorija_id' , 'id');
    }
    public function podkategorijes()
    {
        return $this->hasMany('App\Podkategorije', 'kategorija_id' , 'id');
    }
}
