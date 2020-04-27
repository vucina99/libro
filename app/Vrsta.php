<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vrsta extends Model
{
   	protected $fillable = [
        'naziv',
    ];
    public function proizvodivels()
    {
        return $this->hasMany('App\Proizvodivel', 'proizvodivel_id' , 'id');
    }
    public function proizvodimalos()
    {
        return $this->hasMany('App\Proizvodimalo', 'proizvodimalo_id' , 'id');
    }
}
