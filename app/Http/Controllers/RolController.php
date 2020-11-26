<?php

namespace App\Http\Controllers;

use App;

use App\Rol;

use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rols = Rol::all();
        return view('roles.index',compact('rols'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate ([
            'nombre_rol'=>'required',
            'descripcion'=>'required'
        ]);
            
        $rolNuevo = new App\Rol;
        $rolNuevo->nombre_rol=$request->nombre_rol;
        $rolNuevo->descripcion=$request->descripcion;

        $rolNuevo->save();

return back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rol = App\Rol::findOrFail($id);
        return view('roles.show', compact('rol'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $rol = App\Rol::findOrFail($id);

        $rol->nombre_rol = $request->nombre_rol;
        $rol->descripcion = $request->descripcion;

        $rol->save();

       return redirect('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rol = App\Rol::findOrFail($id);
        $rol->delete();

        return back();
    }
}
