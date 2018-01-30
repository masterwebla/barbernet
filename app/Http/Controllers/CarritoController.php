<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Session;

class CarritoController extends Controller
{
    //Función constructor para inicializar el carrito
    public function __construct(){
    	if(!Session::has('carrito')){
    		Session::put('carrito',array());
    	}
    }

    //Función para mostrar el carrito
    public function mostrar(){
    	$carrito = Session::get('carrito');
    	return view('carrito',compact('carrito'));
    }

    //Función para agregar items al carrito
    public function agregar($id){
    	$carrito = Session::get('carrito');
    	$producto = Producto::find($id);
    	$producto->cantcompra = 1;
    	$carrito[$producto->id] = $producto;
    	Session::put('carrito',$carrito);

    	return redirect()->route('carrito');
    }

    //Función para borrar un item del carrito
    public function borrar($id){
    	$carrito = Session::get('carrito');
    	unset($carrito[$id]);
    	Session::put('carrito',$carrito);
    	return redirect()->route('carrito');
    }

    //Función para vaciar el carrito
    public function vaciar(){
    	Session::forget('carrito');
    	return redirect()->route('carrito');
    }

    //Función para actualizar un item del carrito
    public function actualizar($id, $cantidad){
    	$carrito= Session::get('carrito');
        $producto = Producto::find($id);
        $carrito[$producto->id]->cantcompra = $cantidad;
        Session::put('carrito',$carrito);
        return redirect()->route('carrito');

    }
}
