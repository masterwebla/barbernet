<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formapago extends Model
{
    protected $table = 'formas_pago';
    protected $fillable = ['nombre','descripcion'];
    public $timestamps = false;
}
