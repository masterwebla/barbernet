<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Estado;

class ProductosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    //Funcion para listar
    public function index(Request $request)
    {
        $productos = Producto::orderBy('created_at','desc')->paginate(10);
        return view('admin.productos.index',compact('productos'));
    }

    //Función para crear un nuevo registro
    public function create()
    {
        $estados = Estado::orderBy('nombre','asc')->pluck('nombre','id');
        return view('admin.productos.crear',compact('estados'));
    }

    //Función para guardar los datos del nuevo registro
    public function store(Request $request)
    {
        //Validar datos
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'required',
            'cantidad' => 'required',
            'idestado' => 'required|numeric',
            'puntos' => 'required|numeric',
            'imagen' => 'required'
        ]);

        //Subimos el archivo
        $now = new \DateTime();
        $fecha = $now->format('Ymd-His');
        $imagen = $request->file('imagen');
        $nombre = "producto-".$fecha.".jpg";
        \Storage::disk('local')->put($nombre, \File::get($imagen));

        //Guardar los datos
        $producto = Producto::create([
            'nombre'=>$request->nombre,
            'precio'=>$request->precio,
            'descripcion'=>$request->descripcion,
            'cantidad'=>$request->cantidad,
            'idestado'=>$request->idestado,
            'puntos'=>$request->puntos,
            'imagen'=>$nombre,
        ]);

        $mensaje = $producto?'Producto creado correctamente':'El producto no se creo';

        return redirect()->route('productos.index')->with('mensaje',$mensaje);

    }

    //Función para mostrar el formulario de edición de un registro
    public function edit($id)
    {
        $producto = Producto::find($id);
        $estados = Estado::orderBy('nombre','asc')->pluck('nombre','id');
        return view('admin.productos.editar',compact('producto','estados'));

    }

    //Función para actualizar los datos de un registro
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'required',
            'cantidad' => 'required',
            'idestado' => 'required|numeric',
            'puntos' => 'required|numeric'
        ]);

        $producto = Producto::find($id);
        $nombre = $producto->imagen;

        //Guardar la imágen
        $imagen = $request->file('imagen');
        if($imagen){
            //$now = new \DateTime();
            //$fecha = $now->format('Ymd-His');        
            //$nombre = "producto-".$fecha.".jpg";

            \Storage::disk('local')->put($nombre,  \File::get($imagen));
        }

        
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->cantidad = $request->cantidad;
        $producto->idestado = $request->idestado;
        $producto->puntos = $request->puntos;
        if($imagen){
        	$producto->imagen = $nombre;
        }
        $producto->save();

        return redirect()->route('productos.index');

    }

    //Función para eliminar un registro
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $archivo = $producto->imagen;
        \Storage::delete($archivo);
        $producto->delete();

        $mensaje = $producto?'producto borrado correctamente':'El producto no se borró';

        return redirect()->route('productos.index')->with('mensaje',$mensaje);
    }
}
