<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proizvodivel extends Model
{
    protected $fillable = [
        'naziv','sifra','opis','slika','vrsta_id','cena_jedan','cena_paket','cena_jedan_sniz','cena_paket_sniz','kategorija_id','podkategorija_id'
    ];

    public function kategorije()
    {
        return $this->belongsTo('App\Kategorije','kategorija_id');
    }
    public function podkategorije()
    {
        return $this->belongsTo('App\Podkategorije','podkategorija_id');
    }
    public function bojevels()
    {
        return $this->hasMany('App\Bojevel','proizvodivel_id','id');
    }
    public function vrsta()
    {
        return $this->belongsTo('App\Vrsta' , 'proizvodivel_id');
    }
}
