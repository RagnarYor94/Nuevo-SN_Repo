@extends('layouts.app')

@section('content')
    <div class="row" style="margin:0; height:91vh;">
        <div class="p-3 bg-dark col-2">
            <table class="table table-sm">
                <thead>
                    <tr class="text-white text-center">
                        <th scope="col">
                            <span class="text-strong">Men</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-white text-center">
                    <tr>
                        <td>
                            <div class="btn-group dropright">
                                <p type="button" class="bg-transparent text-white dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Configuración
                                </p>
                                <div class="dropdown-menu bg-secondary rounded-lg" style="padding:0;">
                                    <p class="border-bottom text-center text-white" style="margin:8px 0 0 0;">
                                        <a class="text-decoration-none text-white"
                                            href="{{ route('catalogoHoteles.cadena') }}">Cadenas hoteleras</a>
                                    </p>
                                    <p class="border-bottom text-center text-white" style="margin:8px 0 0 0;">
                                        <a class="text-decoration-none text-white"
                                            href="{{ route('catalogoHoteles.locaciones') }}">Locaciones</a>
                                    </p>
                                    <p class="text-center text-white" style="margin:8px 0 0 0;">
                                        <a class="text-decoration-none text-white"
                                            href="{{ route('catalogoHoteles.hoteles') }}">Hoteles</a>
                                    </p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="btn-group dropright">
                                <p type="button" class="bg-transparent text-white dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Usuarios
                                </p>
                                <div class="dropdown-menu bg-secondary rounded-lg" style="padding:0;">
                                    <p class="border-bottom text-center text-white" style="margin:8px 0 0 0;">
                                        <a class="text-decoration-none text-white"
                                            href="{{ route('usuarios.index') }}">Editar Usuarios</a>
                                    </p>
                                    <p class="border-bottom text-center text-white" style="margin:8px 0 0 0;">
                                        <a class="text-decoration-none text-white"
                                            href="{{ route('roles.index') }}">Roles</a>
                                    </p>
                                    <p class="text-center text-white" style="margin:8px 0 0 0;">
                                        <a class="text-decoration-none text-white" href="#">Permisos</a>
                                    </p>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-10">
            @yield('body')
        </div>
    </div>
@endsection
