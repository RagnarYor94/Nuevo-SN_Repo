@extends('layouts.menu')

@section('body')

    <h1 class="text-center mt-3">Rol de Usuario</h1>

    <div>
        <div class="Rol ml-2">
            <h3>Crear Rol Nuevo</h3>
        </div>
        <div>
            <form method="POST" action="{{ route('roles.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nombre_rol" class="text-primary">Nombre del Rol</label>
                    <input type="text" class="form-control" id="nombre_rol" placeholder="Nombre del Rol" name="nombre_rol">
                </div>
                <div class="form-group">
                    <label for="descripcion" class="text-primary">Descripcion del Rol</label>
                    <input type="text" class="form-control" id="descripcion" placeholder="Descripcion" name="descripcion">
                </div>
                <button type="submit" class="btn btn-success mb-5">Submit</button>
            </form>
        </div>
    </div>

    <div class="m-3">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">Id</th>
                    <th scope="col" class="text-center">Rol</th>
                    <th scope="col" class="text-center">Descripcion</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($rols as $rol)
                        <th scope="row" class="text-center">{{ $rol->id }}</th>
                        <td class="text-center">{{ $rol->nombre_rol }}</td>
                        <td class="text-center">{{ $rol->descripcion }}</td>
                        <td class="text-center">
                            <a href="{{ route('roles.show', $rol) }}" class=" btn btn-warning">Editar</a>
                            <form action="{{ route('roles.destroy', $rol->id) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection
