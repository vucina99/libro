<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bojemalo extends Model
{
    protected $fillable = [
        'boja','proizvodimalo_id'
    ];
    public function proizvodimalo()
    {
        return $this->belongsTo('App\Proizvodimalo' , 'proizvodimalo_id');
    }
}
