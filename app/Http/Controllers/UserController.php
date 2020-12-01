<?php

namespace App\Http\Controllers;

use App;

use App\Rol;

use App\User;

use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App as FacadesApp;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        $usuario = DB::table('rols')->join('users','users.rol_id','=','rols.id')
        ->select('rols.nombre_rol','users.id','users.name','users.primer_nombre','users.apellido','users.cumpleaños','users.email')
        ->get();
        return view('usuarios.index', compact('users', 'usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Rol::all();
        //$usuario = Rol::find($id);
        $users = User::all();
        return view('usuarios.create', compact('users', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $nuevoUsuario = new App\User;
        $nuevoUsuario->rol_id = $request->nombre_rol;
        $nuevoUsuario->name = $request->name;
        $nuevoUsuario->primer_nombre = $request->primer_nombre;
        $nuevoUsuario->apellido = $request->apellido;
        $nuevoUsuario->cumpleaños = $request->cumpleaños;
        $nuevoUsuario->email = $request->email;
        $nuevoUsuario->password = $request->password;

        $nuevoUsuario->save();

        return redirect('usuarios')->with('mensaje','Usuario creado exitosamente!');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios = DB::table('rols')->join('users','users.rol_id','=','rols.id')
        ->select('rols.nombre_rol')
        ->get();

        $roles = Rol::all();
        $usuario = Rol::find($id);
        $user = App\User::findOrFail($id);
        
        return view('usuarios.show', compact('user','usuario','usuarios', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    

        $actualizarUsuario = App\User::findOrFail($id);
        $actualizarUsuario->rol_id = $request->nombre_rol;
        $actualizarUsuario->name = $request->name;
        $actualizarUsuario->primer_nombre = $request->primer_nombre;
        $actualizarUsuario->apellido = $request->apellido;
        $actualizarUsuario->cumpleaños = $request->cumpleaños;
        $actualizarUsuario->email = $request->email;
        $actualizarUsuario->password = $request->password;

        $actualizarUsuario->save();

        return redirect('usuarios');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminarUsuario = App\User::findOrFail($id);
        $eliminarUsuario->delete();

        return back();
    }
}