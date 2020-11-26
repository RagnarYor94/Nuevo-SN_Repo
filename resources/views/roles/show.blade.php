@extends('layouts.menu')

@section('body')

    <h1 class="text-center">Editar rol {{ $rol->nombre_rol }}</h1>

    <form action="{{ route('roles.update', $rol->id) }}" method="POST">
        @method('PUT')
        @csrf
        <label for="nombre_rol">Nuevo nombre del Rol</label>
        <input type="text" class="form-control" id="nombre_rol" name="nombre_rol" value="{{ $rol->nombre_rol }}">
        <label for="descripcion">Nueva Descripcion</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $rol->descripcion }}">
        <div class=" mt-3">
            <button class="btn btn-warning" type="submit">Enviar nuevos datos</button>
        </div>
    </form>

@endsection
