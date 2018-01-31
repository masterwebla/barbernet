<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordenproducto extends Model
{
    protected $table = 'orden_productos';
    protected $fillable = ['numero','precio', 'cantidad','fecha','idproducto','idestado','iduser','idcupon'];

    public function producto(){
    	return $this->hasOne('App\Producto','id','idproducto');
    }
}
