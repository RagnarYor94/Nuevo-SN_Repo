<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use App\Cadena;

class CadenaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
    function vista()
    {
        $cadenas = App\Cadena::paginate(8);
        return view('catalogoHoteles.cadena',compact('cadenas'));
    }
    function guardar(Request $request)
    {
        $request->validate([
            'nombreCadena' => 'required'
        ]);
        
        try {
            
            $nueva_cadena = new App\Cadena;
            $nueva_cadena->cadena_hotelera = $request->nombreCadena;
            $nueva_cadena->save();

            return back()->with('mensaje','Se agrego correctamente');            

        } catch (Exception $e) {

            return back()->with('mensaje','No se guardo');            
        }

        $nueva_cadena = new App\Cadena;
        $nueva_cadena->cadena_hotelera = $request->nameCadena;
        $nueva_cadena->save();

        return back()->with('mensaje','Se agrego correctamente');
    }
    function eliminar($id)
    {
        $deleteCadena = App\Cadena::FindOrFail($id);
        $deleteCadena->delete();
        
        return back()->with('mensaje','Se borro la cadena con exito');
    }
    function editar($id){
        $cadena = App\Cadena::FindOrFail($id);
        return view('catalogoHoteles.editarCadena',compact('cadena'));
    }
    function actualizar(Request $request, $id)
    {
        
        // $request->validate([
        //     'name_cadena' => 'request'
        // ]);
        $cadena = App\Cadena::FindOrFail($id);

        $cadena->cadena_hotelera = $request->name_cadena;

        $cadena->save();

        return back()->with('mensaje','Registro actualizado, regresar a la pagina principal.');

    }
}
