<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';
    protected $fillable = ['fecha_inicial','fecha_final','hora_incial','hora_final','iduser'];
}
