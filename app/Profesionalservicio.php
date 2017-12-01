<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesionalservicio extends Model
{
    protected $table = 'profesional_servicio';
    protected $fillable = ['iduser','idservicio'];
}
