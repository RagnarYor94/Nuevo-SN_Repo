@extends('layouts.menu')

@section('body')

<h1 class="title">Editar Cadena Hotelera</h1>

<div class="container border border-primary rounded p-3">
    <form action="{{route('actualizarCadena',$cadena->id)}}" method="POST" >
        @method('PUT')
        @csrf
            <div class="form-group col-6">
                <label class="text-primary p-1 font-weight-bold" for="input_nombre">Nuevo Nombre de la Cadena</label>
                <input type="text" class="form-control" id="input_nombre" name="name_cadena" value="{{$cadena->cadena_hotelera}}">
            </div>
            <button type="submit" class="btn btn-primary ml-3">Actualizar Cambio</button>
            <a href="{{route('catalogoHoteles.cadena')}}">
                <button type="button" class="btn btn-danger">Cancela</button>
            </a>
    </form>
  </div>
  @if(session('mensaje'))
    <a href="{{route('catalogoHoteles.cadena')}}" class="text-decoration-none">
        <div class="alert alert-success mt-2">
            {{session('mensaje')}} 
        </div>
    </a>
  @endif
@endsection