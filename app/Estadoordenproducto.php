<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadoordenproducto extends Model
{
    protected $table = 'estados_orden_producto';
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
