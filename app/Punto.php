<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Punto extends Model
{
    protected $table = 'puntos';
    protected $fillable = ['puntos','iduser'];

}
