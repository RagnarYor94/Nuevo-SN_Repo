@extends('layouts.menu')

@section('body')

<h1 class="title m-3">Editar Locación</h1>

<div class="container border border-primary rounded p-3">
    <form action="{{route('actualizarLocacion',$locacion->id)}}" method="POST" >
        @method('PUT')
        @csrf
            <div class="form-group col-6">
                <label class="text-primary p-1 font-weight-bold" for="input_nombre">Nuevo Nombre del hotel</label>
                <input type="text" class="form-control" id="input_nombre" name="nameLocacion" value="{{$locacion->localidad_nombre}}">
            </div>
            <button type="submit" class="btn btn-primary ml-3">Actualizar Cambio</button>
            <a href="{{route('catalogoHoteles.locaciones')}}">
                <button type="button" class="btn btn-danger">Cancela</button>
            </a>
            
    </form>
  </div>

@endsection