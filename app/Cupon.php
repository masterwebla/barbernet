<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    protected $table = 'cupones';
    protected $fillable = ['codigo','porcentaje','fecha_caducidad'];
    public $timestamps = false;
}
