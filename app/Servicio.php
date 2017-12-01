<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    //Definir la tabla con la que se conectará este modelo
    protected $table = 'servicios';

    //Campos diligenciables por el usuario
    protected $fillable = ['nombre','precio','descripcion','duracion','idestado','puntos'];

    //Relación con el modelo Estado
    public function estado(){
    	return $this->hasOne('App\Estado','id','idestado');
    }

    //Buscador de Servicios por nombre
    public function scopeNombre($query,$nombre){
    	return $query->where('nombre','LIKE','%'.$nombre.'%');
    }

    //Buscador de Servicios por precio
	public function scopePrecio($query,$precio){
    	return $query->where('precio','LIKE','%'.$precio.'%');
    }    

}
