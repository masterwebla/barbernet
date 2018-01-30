<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicio;
use App\Producto;

class PaginasController extends Controller
{
    //Función para el inicio
    public function inicio(){
        $productos = Producto::orderBy('created_at','desc')->get();
        return view('index',compact('productos'));
    }

    //Función para ver detalles de un producto
    public function productoDetalles($id){
        $producto = Producto::find($id);
        return view('productodetalles',compact('producto'));
    }

    //Función para abrir la vista nosotros
    public function nosotros(){
    	return view('nosotros');
    }

    //Función para abrir la vista de productos
    public function productos(){
    	return view('productos');
    }

    //Función para mostrar los servicios
    public function servicios(){
    	$servicios = Servicio::all();
    	return view('servicios',compact('servicios'));
    }
}
