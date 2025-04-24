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

    

<div class="container py-4" style="background-color: #FFE5B4;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-dark">Clubes Deportivos</h2>
        @if (Auth::user()->cod_tipo_fk == 'E')
        <a href="{{ route('clubes.create') }}" class="btn btn-primary">Crear Nuevo Club</a>
        @endif
    </div>

    <div class="row">
        @foreach ($clubes as $club)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm rounded-3" style="background-color: #fdf0d5;">
                <div class="card-body">
                    <h5 class="card-title">{{ $club->nombreClub }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Mensualidad: ${{ number_format($club->mensualidadClub, 0, ',', '.') }}</h6>
                    <p class="card-text">{{ $club->descripcionClub }}</p>
                    <a href="{{ route('clubes.show', ['clube' => $club->idClub]) }}" class="btn btn-outline-primary btn-sm">Ver detalles</a>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
