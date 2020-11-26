@extends('layouts.menu')

@section('body')

<h1 class="title">Editar Hotel</h1>

<div class="container border border-primary rounded p-3">
    <form action="{{route('actualizarHotel',$hotel->id)}}" method="POST" >
        @method('PUT')
        @csrf
            <div class="form-group col-6">
                <label class="text-primary p-1 font-weight-bold" for="input_nombre">Nuevo Nombre del hotel</label>
                <input type="text" class="form-control" id="input_nombre" name="nameHotel" value="{{$hotel->nombre_hotel}}">
            </div>
            <div class="form-group col-6">
                <label class="text-primary p-1 font-weight-bold" for="nameCadena">Nueva Cadena Hotelera</label>
                <select class="form-control" name="idCadena" id="nameCadena">
                    <option selected>Seleciona una nueva Cadena Hotelera</option>
                    @foreach($cadenas as $cadena)
                    <option value="{{$cadena->id}}">{{$cadena->cadena_hotelera}}</option>
                    @endforeach
                </select>
                <label class="text-primary p-1 font-weight-bold" for="nameLocacion">Nueva Locación</label>
                <select class="form-control" name="idLocacion" id="nameLocacion">
                    <option selected>Selecciona una nueva Locacion</option>
                    @foreach($locaciones as $locacion)
                        <option value="{{$locacion->id}}">{{$locacion->localidad_nombre}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Actualizar Cambio</button>
            <a href="{{route('catalogoHoteles.hoteles')}}">
                <button type="button" class="btn btn-danger">Cancela</button>
            </a>
            
    </form>
  </div>
  @if(session('mensaje'))
    <a href="#" class="text-decoration-none">
        <div class="alert alert-success mt-2">
            {{session('mensaje')}} 
        </div>
    </a>
  @endif
@endsection