@extends('layouts.menu')

@section('body')

    <h1 class="text-center">Editar Usuario {{ $user->name }}</h1>

    <form action="{{ route('usuarios.update', $user->id) }}" method="POST">
        @method('PUT')
        @csrf
        <label for="nombre_rol">Nuevo Rol</label>
        <select name="nombre_rol" id="nombre_rol" class="form-control">
            <option selected value="{{ old('nombre_rol') }}">Selecciona el nuevo rol</option>
            @foreach ($roles as $petardos)
                <option value="{{ $petardos->id }}">{{ $petardos->nombre_rol }}</option>
            @endforeach
        </select>
        <label for="name">Nuevo nombre de usuario</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        <label for="primer_nombre">Primer Nombre</label>
        <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" value="{{ $user->primer_nombre }}">
        <label for="apellido">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $user->apellido }}">
        <label for="cumnpleaños">Cumpleaños</label>
        <input type="date" class="form-control" id="cumppleaños" name="cumpleaños" value="{{ $user->cumpleaños }}">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="{{ $user->email }}" id="email">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" name="password" id="password" value="{{ $user->password }}">
        <div class=" mt-3">
            <button class="btn btn-success" type="submit">Enviar nuevos datos</button>
        </div>
    </form>

@endsection
