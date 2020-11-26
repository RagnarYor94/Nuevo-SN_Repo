@extends('layouts.menu')

@section('body')

    <h1 class="title m-3">Hoteles</h1>

    <form action="{{ route('guardarHotel') }}" method="POST" class="m-3">
        {{ @csrf_field() }}
        <div class="form-group">
            <label class="text-primary p-1 font-weight-bold" for="nameHotel">Nombre del Hotel</label>
            <input type="text" class="form-control" id="nameHotel" name="nombreHotel"
                placeholder="Ingrese el nombre de la cadena">
            <label class="text-primary p-1 font-weight-bold" for="cadenasHoteleras">Cadena Hotelera</label>
            <select class="form-control" name="cadenaHotelera" id="cadenasHoteleras">
                <option selected >Seleciona una Cadena</option>
                @foreach($cadena as $item)
                    <option value="{{$item->id}}">{{$item->cadena_hotelera}}</option>
                @endforeach
            </select>
            <label class="text-primary p-1 font-weight-bold" for="locacionHotelera">Locación</label>
            <select class="form-control" name="locacionHotelera" id="locacionHotelera">
                <option selected>Selecciona una Locación</option>
                @foreach($locaciones as $itemLocacion)
                    <option value="{{$itemLocacion->id}}">{{$itemLocacion->localidad_nombre}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Agregar</button>

</form>

@if(session('mensaje'))
    <div class="alert alert-success mt-2">
        {{session('mensaje')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('mensajeError'))
    <div class="alert alert-danger">
        {{session('mensajeError')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hiden="true">&times;</span>
        </button>
    </div>

@endif
<div class="container mt-3">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" scope="col">ID</th>
                <th class="text-center" scope="col">Nombre Hotel</th>
                <th class="text-center" scope="col">Cadena</th>
                <th class="text-center" scope="col">Locación</th>
                <th class="text-center" scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($query as $item)
            <tr>
                <th class="text-center" scope="row">{{$item->id}}</th>
                <td class="text-center">{{$item->nombre_hotel}}</td>
                
                <td class="text-center">{{$item->cadena_hotelera}}</td>
                <td class="text-center">{{$item->localidad_nombre}}</td>
                
                <td class="text-center">
                    <a href="{{route('catalogoHoteles.editarHoteles',$item->id)}}">
                        <button type="button" class=" btn btn-warning">Editar</button>
                    </a>
                    <form action="{{route('eliminarHotel',$item->id)}}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
</div>

{{$hotel->links()}}


@endsection

