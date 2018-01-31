<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Producto;
use App\Ordenproducto;
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
    	$carrito = Session::get('carrito');
        $producto = Producto::find($id);
        $carrito[$producto->id]->cantcompra = $cantidad;
        Session::put('carrito',$carrito);
        return redirect()->route('carrito');
    }

    //Función para guardar la orden
    public function ordenar(){
        $carrito = Session::get('carrito');
        if($carrito){
            $numero = Ordenproducto::max('numero')+1;
            $now = new \DateTime();
            $fecha = $now->format('Y-m-d h:m:s');

            foreach($carrito as $producto){
                $orden = Ordenproducto::create([
                    'numero'=>$numero,
                    'precio'=>$producto->precio,
                    'cantidad'=>$producto->cantcompra,
                    'fecha'=>$fecha,
                    'idproducto'=>$producto->id,
                    'idestado'=>1,
                    'iduser'=>Auth::user()->id,
                    'idcupon'=>1,                    
                ]);
            }

            return redirect()->route('orden-detallada',$numero);
        }
    }

    //Función para mostrar detalles de la Orden
    public function ordenDetallada($numero){
        $productos = Ordenproducto::where('numero',$numero)->get();
        return view('orden',compact('productos'));
    }

}
