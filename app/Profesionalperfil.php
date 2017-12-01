<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesionalperfil extends Model
{
    protected $table = 'profesional_perfil';
    protected $fillable = ['descripcion','galeria','iduser'];
}
