<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    protected $fillable = [
        'naziv', 'vrsta' , 'katalog'
    ];
}
