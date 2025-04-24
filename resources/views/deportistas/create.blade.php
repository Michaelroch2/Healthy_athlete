@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('deportistas.index')}}" class="btn btn-secondary mb-2">Volver</a>

        </div>
        <div class="col-md-4">
            <form action="{{route('deportistas.store')}}" method="POST">
                <label for="">
                    <h2 class="text-success">Agregar Deportista</h2>
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-control-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="">
                        @error('nombre')
                            <small class="text-danger">{{ $message }}</small>
                            
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-control-label">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" value="">
                        @error('apellido')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edad" class="form-control-label">Edad</label>
                        <input type="number" class="form-control" name="edad" id="edad" value="">
                        @error('edad')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deporte" class="form-control-label">Deporte</label>
                        <select class="form-control" name="deporte" id="deporte">
                                <option value="">Seleccione un deporte</option>
                                <option value="Fútbol">Fútbol</option>
                                <option value="Baloncesto">Baloncesto</option>
                                <option value="Voleibol">Voleibol</option>
                                <option value="Atletismo">Atletismo</option>
                                <option value="Natación">Natación</option>
                                <option value="Tenis">Tenis</option>
                                <option value="Ciclismo">Ciclismo</option>
                                <option value="Gimnasia">Gimnasia</option>
                        </select>
                        @error('deporte')
                            <small class="text-danger">{{ $message }}</small><br>
                        @enderror
                    </div>
                </label><br>
                <button type="submit" class="btn btn-primary mt-2">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection