@extends('layouts.menu')

@section('body')

    <h1 class="title mt-3">Cadenas Hoteleras</h1>

    <form action="{{ route('guardarCadena') }}" method="POST">
        {{ @csrf_field() }}
        <div class="form-group">
            <label class="text-primary p-1 font-weight-bold" for="nameCadena">Nombre de la Cadena</label>
            <input type="text" class="form-control" name="nombreCadena" placeholder="Ingrese el nombre de la cadena">
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Agregar</button>
    </form>

    @if (session('mensaje'))
        <div class="alert alert-success mt-2">{{ session('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="d-flex flex-wrap bd-highlight mb-3 row-cols-5 mt-2  ">

    @foreach($cadenas as $item)
    <div class="col m-1" >
        <div class="row">
        <div class="card border-dark col" style="max-width: 14rem;padding:0;">
        <div class="card-header  bg-secondary text-white">Nombre de la Cadena {{$item->id}}</div>
        <div class="card-body text-dark">
            <h5 class="card-title">{{$item->cadena_hotelera}}</h5>
            <a href="{{route('catalogoHoteles.editarCadena',$item)}}">
            
            <button type="button" class="btn btn-warning">Editar</button>
            </a>
            <form action="{{route('eliminarCadena',$item)}}" method="POST" class="d-inline">
            @method('DELETE')
            @csrf
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
        </div>
    </div>
    </div>

    
    @endforeach
    </div>

    {{$cadenas->links()}}
    
@endsection
