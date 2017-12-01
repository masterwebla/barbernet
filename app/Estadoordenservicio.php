<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadoordenservicio extends Model
{
    protected $table = 'estados_orden_servicio';
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
