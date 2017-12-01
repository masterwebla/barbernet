<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordenproducto extends Model
{
    protected $table = 'orden_productos';
    protected $fillable = ['numero','precio','fecha','idservicio','idestado','iduser','idcupon'];
}
