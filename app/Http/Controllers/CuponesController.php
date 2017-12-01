<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cupon;

class CuponesController extends Controller
{
    //Funcion para listar
    public function index()
    {
        $cupones = Cupon::paginate(10);
        return view('admin.cupones.index',compact('cupones'));
    }

    //Función para crear un nuevo registro
    public function create()
    {
        return view('admin.cupones.crear');
    }

    //Función para guardar los datos del nuevo registro
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:cupones',
            'porcentaje' => 'required|numeric',
            'fecha_caducidad' => 'required|date'
        ]);

        $cupon = Cupon::create([
            'codigo'=>$request->codigo,
            'porcentaje'=>$request->porcentaje,
            'fecha_caducidad'=>$request->fecha_caducidad
        ]);

        return redirect()->route('cupones.index');

    }

    //Función para mostar información de un registro
    public function show($id)
    {
        //
    }

    //Función para mostrar el formulario de edición de un registro
    public function edit($id)
    {
        $cupon = Cupon::find($id);
        return view('admin.cupones.editar',compact('cupon'));

    }

    //Función para actualizar los datos de un registro
    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo' => 'required|unique:cupones',
            'porcentaje' => 'required|numeric',
            'fecha_caducidad' => 'required|date'
        ]);

        $cupon = Cupon::find($id);
        $cupon->codigo = $request->codigo;
        $cupon->porcentaje = $request->porcentaje;
        $cupon->fecha_caducidad = $request->fecha_caducidad;
        $cupon->save();

        return redirect()->route('cupones.index');

    }

    //Función para eliminar un registro
    public function destroy($id)
    {
        $cupon = Cupon::find($id);
        $cupon->delete();

        return redirect()->route('cupones.index');
    }
}
