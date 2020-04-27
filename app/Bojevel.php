<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bojevel extends Model
{
    protected $fillable = [
        'boja','proizvodivel_id'
    ];
    public function proizvodivel()
    {
        return $this->belongsTo('App\Proizvodivel','proizvodivel_id');
    }
}
