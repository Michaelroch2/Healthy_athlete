@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-primary">CRUD Entrenadores</h2>
        </div>

        <div class="col-md-12 mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Documento</th>
                        <th>Edad</th>
                        <th>Correo</th>
                        <th>Genero</th>
                        <th>Rol</th>
                        <th style="width: 30%;">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user )
                    <tr class="text-center">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nombre }}</td>
                        <td>{{ $user->apellido }}</td>
                        <td>{{ $user->numero_documento }}</td>
                        <td>{{ $user->edad }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->genero }}</td>
                        <td>{{ ucfirst($user->cod_tipo_fk) }}</td>
                        <td>
                            <a href="{{ route('entrenadores.edit', $user->id) }}" class="btn btn-success btn-sm">Editar</a>
                            <form action="{{ route('entrenadores.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Está seguro de eliminar el usuario??!!')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr class="text-center">
                        <td colspan="8">No hay usuarios registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
