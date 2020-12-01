@extends('layouts.menu')

@section('body')
    <div class="text-center">
        <h1>Menu de Usuarios</h1>
    </div>
    <div>
        <a href="{{ route('usuarios.create') }}">
            <h1 class="text-center">Crear nuevo usuario aqui!!!</h1>
        </a>
    </div>
    <div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">Id</th>
                    <th scope="col" class="text-center">Rol</th>
                    <th scope="col" class="text-center">Nombre</th>
                    <th scope="col" class="text-center">Primer Nombre</th>
                    <th scope="col" class="text-center">Apellido</th>
                    <th scope="col" class="text-center">Cumpleaños</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($usuario as $user)
                        <th scope="row" class="text-center">{{ $user->id }}</th>
                        <td class="text-center">{{ $user->nombre_rol }}</td>
                        <td class="text-center">{{ $user->name }}</td>
                        <td class="text-center">{{ $user->primer_nombre }}</td>
                        <td class="text-center">{{ $user->apellido }}</td>
                        <td class="text-center">{{ $user->cumpleaños }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center"><a href="{{ route('usuarios.edit', $user->id) }}"
                                class="btn btn-warning">Editar</a>
                            <form action="{{ route('usuario.destroy', $user->id) }}" method="POST" class="d-inline">
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
    @if (session('mensaje'))
        <div class="alert alert-success mt-2">{{ session('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


@endsection
