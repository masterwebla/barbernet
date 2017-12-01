<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordenservicio extends Model
{
    protected $table = 'orden_servicios';
    protected $fillable = ['numero','precio','fecha','idservicio','idestado','iduser','idcupon'];
}
