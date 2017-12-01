<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;

class PerfilesController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin',['except'=>'index']);
    }

    //Funcion para listar
    public function index()
    {
        $perfiles = Perfil::paginate(10);
        return view('admin.perfiles.index',compact('perfiles'));
    }

    //Función para crear un nuevo registro
    public function create()
    {
        return view('admin.perfiles.crear');
    }

    //Función para guardar los datos del nuevo registro
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:perfiles'
        ]);

        $perfil = Perfil::create([
            'nombre'=>$request->nombre
        ]);

        return redirect()->route('perfiles.index');

    }

    //Función para mostar información de un registro
    public function show($id)
    {
        //
    }

    //Función para mostrar el formulario de edición de un registro
    public function edit($id)
    {
        $perfil = Perfil::find($id);
        return view('admin.perfiles.editar',compact('perfil'));

    }

    //Función para actualizar los datos de un registro
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|unique:perfiles'
        ]);

        $perfil = Perfil::find($id);
        $perfil->nombre = $request->nombre;
        $perfil->save();

        return redirect()->route('perfiles.index');

    }

    //Función para eliminar un registro
    public function destroy($id)
    {
        $perfil = Perfil::find($id);
        $perfil->delete();

        return redirect()->route('perfiles.index');
    }
}
