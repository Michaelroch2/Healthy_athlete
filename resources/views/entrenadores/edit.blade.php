@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('entrenadores.index')}}" class="btn btn-secondary mb-2">Volver</a>

        </div>
        <div class="col-md-4">
            <form action="{{route('entrenadores.store')}}" method="POST">
                <label for="">
                    <h2 class="text-success">Agregar Entrenador</h2>
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-control-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{$entrenador->nombre}}
                        2>
                        @error('nombre')
                            <small class="text-danger">{{ $message }}</small>
                            
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-control-label">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" value="{{$entrenador->apellido}}">
                        @error('apellido')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edad" class="form-control-label">Edad</label>
                        <input type="number" class="form-control" name="edad" id="edad" value="{{$entrenador->edad}}">
                        @error('edad')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="especialidad" class="form-control-label">Deporte especializado</label>
                        <select class="form-control" name="especialidad" id="especialidad" value="{{$entrenador->especialidad}}">
                                <option value="">Seleccione un deporte</option>
                                <option value="Fútbol">Fútbol</option>
                                <option value="Baloncesto">Baloncesto</option>
                                <option value="Voleibol">Voleibol</option>
                                <option value="Atletismo">Atletismo</option>
                                <option value="Natación">Natación</option>
                                <option value="Tenis">Tenis</option>
                                <option value="Ciclismo">Ciclismo</option>@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Volver</a>
        </div>

        <div class="col-md-6">
            <form action="{{ route('users.update', $users->id) }}" method="POST">
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
                    <label for="correo">Correo electrónico</label>
                    <input type="email" class="form-control" name="correo" value="{{ $users->correo }}">
                    @error('correo')
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
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" name="password">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="form-group mt-2">
                    <label for="rol">Rol</label>
                    <select class="form-control" name="rol">
                        <option value="">Selecciona un rol</option>
                        <option value="deportista">Deportista</option>
                        <option value="entrenador">Entrenador</option>
                        <option value="admin">Administrador</option>
                    </select>
                    @error('rol')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection

                                <option value="Gimnasia">Gimnasia</option>
                        </select>
                        @error('especialidad')
                            <small class="text-danger">{{ $message }}</small><br>
                        @enderror
                    </div>
                </label><br>
                <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection