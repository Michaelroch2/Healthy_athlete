@extends('layouts.app')

@section('content')
<style>
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color:rgb(231, 184, 97);
    }

    .card {
        
        background-color: #FFE5B4;
    }
    
</style>
<div class="container">
    <div class="mb-4">
        <h2 class="text-primary">{{ $club->nombreClub }}</h2>
        <p><strong>Descripción:</strong> {{ $club->descripcionClub }}</p>
        <p><strong>Mensualidad:</strong> ${{ number_format($club->mensualidadClub, 0, ',', '.') }}</p>
    </div>

    <hr>

    <div class="mb-4 d-flex justify-content-between align-items-center">
        <h4>Rutinas del Club</h4>

        @if(auth()->user()->cod_tipo_fk === 'entrenador')
            <a href="#" class="btn btn-success btn-sm disabled">Crear Rutina (próximamente)</a>
        @endif
    </div>

    <div class="alert alert-info">
        Las rutinas aún no están disponibles. Próximamente podrás verlas aquí.
    </div>
</div>
@endsection
