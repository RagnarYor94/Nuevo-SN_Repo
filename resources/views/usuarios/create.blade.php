@extends('layouts.menu')

@section('body')

    <h1 class="text-center">Crear nuevo Usuario</h1>

    <form method="POST" action="{{ route('usuarios.store') }}">
        @csrf
        <label for="nombre_rol">Nuevo Rol</label>
        <select name="nombre_rol" id="nombre_rol" class="form-control">
            <option value="selected">Escoge el Rol</option>
            @foreach ($roles as $petardos)
                <option value={{ $petardos->id }}>{{ $petardos->nombre_rol }}</option>
            @endforeach
        </select>
        <label for="name">Nuevo nombre de usuario</label>
        <input type="text" class="form-control" id="name" name="name">
        <label for="primer_nombre">Primer Nombre</label>
        <input type="text" class="form-control" id="primer_nombre" name="primer_nombre">
        <label for="apellido">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido">
        <label for="cumpleaños">Cumpleaños</label>
        <input type="date" class="form-control" name="cumpleaños" id="cumpleaños">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" name="password" id="password">
        <div class=" mt-3">
            <button class="btn btn-warning" type="submit">Enviar nuevos datos</button>
        </div>
    </form>

@endsection
