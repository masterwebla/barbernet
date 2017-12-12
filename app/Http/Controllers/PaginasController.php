<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicio;

class PaginasController extends Controller
{
    //Función para el inicio
    public function inicio(){
        return view('index');
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
