<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kategorije extends Model
{
    protected $fillable = [
        'naziv',
    ];

    public function pathmal()
    {
         return url("/prikazproizvodakategorije/maloprodaja/{$this->id}-" . Str::slug($this->naziv));
    }
    public function pathvel()
    {
         return url("/prikazproizvodakategorije/veleprodaja/{$this->id}-" . Str::slug($this->naziv));
    }
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
