<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['nombre','precio','descripcion','cantidad','idestado','puntos','imagen'];


    //Relación con el modelo Estado
    public function estado(){
    	return $this->hasOne('App\Estado','id','idestado');
    }
}

