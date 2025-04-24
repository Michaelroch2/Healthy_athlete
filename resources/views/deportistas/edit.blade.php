@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('deportistas.index') }}" class="btn btn-secondary mb-3">Volver</a>
        </div>

        <div class="col-md-6">
            <form action="{{ route('deportistas.update', $users->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="{{ $users->nombre }}">
                    @error('nombre')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" name="apellido" value="{{$users->apellido}}"> 
                    @error('apellido')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="tipo_documento">Tipo de documento</label>
                    <select name="tipo_documento" class="form-control" required>
                        <option value="">Seleccione</option>
                        <option value="CC">Cédula de ciudadanía</option>
                        <option value="TI">Tarjeta de identidad</option>
                        <option value="CE">Cédula de extranjería</option>
                    </select>

                    @error('tipo_documento')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="numero_documento">Número de documento</label>
                    <input type="text" class="form-control" name="numero_documento" value="{{$users->numero_documento}}">
                    @error('numero_documento')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="edad">Edad</label>
                    <input type="number" class="form-control" name="edad" value="{{ $users->edad }}">
                    @error('edad')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-control" name="email" value="{{ $users->email }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mt-2">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control" required>
                    @error('fecha_nacimiento')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mt-2">
                <label for="genero">Género</label>
                    <select name="genero" class="form-control" required>
                        <option value="">Seleccione</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                        <option value="otro">Otro</option>
                    </select>
                    @error('genero')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                


                <div class="form-group mt-2">
                    <label for="cod_tipo_fk">Rol</label>
                    <select class="form-control" name="cod_tipo_fk">
                        <option value="">Selecciona un rol</option>
                        <option value="deportista">Deportista</option>
                        <option value="entrenador">Entrenador</option>
                    </select>
                    @error('cod_tipo_fk')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection
