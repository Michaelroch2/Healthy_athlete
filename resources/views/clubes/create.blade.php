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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Nuevo Club') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('clubes.store') }}" id="club-form">
                        @csrf

                        <div class="mb-3">
                            <label for="nombreClub" class="form-label">{{ __('Nombre del Club') }}</label>
                            <input id="nombreClub" type="text" class="form-control @error('nombreClub') is-invalid @enderror" name="nombreClub" value="{{ old('nombreClub') }}" required autocomplete="nombreClub" autofocus maxlength="25">

                            @error('nombreClub')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="descripcionClub" class="form-label">{{ __('Descripción') }}</label>
                            <textarea id="descripcionClub" class="form-control @error('descripcionClub') is-invalid @enderror" name="descripcionClub" rows="3" maxlength="100">{{ old('descripcionClub') }}</textarea>

                            @error('descripcionClub')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="mensualidadClub" class="form-label">{{ __('Cuota mensual') }}</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input id="mensualidadClub" type="number" class="form-control @error('mensualidadClub') is-invalid @enderror" name="mensualidadClub" value="{{ old('mensualidadClub') }}" required>
                            </div>

                            @error('mensualidadClub')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('clubes.index') }}" class="btn btn-secondary me-md-2">{{ __('Cancelar') }}</a>
                            <button type="submit" class="btn btn-primary" id="submit-btn">{{ __('Crear Club') }}</button>
                        </div>
                    </form>

                    <div id="success-message" class="alert alert-success mt-3 text-center" style="display: none;">
                        <h4>Guardado exitosamente</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('club-form');
    const successMessage = document.getElementById('success-message');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Si quieres simplemente mostrar el mensaje sin enviar a base de datos
        form.style.display = 'none';
        successMessage.style.display = 'block';
        
        
        fetch("{{ route('clubes.store') }}", {
            method: 'POST',
            body: new FormData(form),
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            credentials: 'same-origin'
        })
        .then(response => response.json())
        .then(data => {
            form.style.display = 'none';
            successMessage.style.display = 'block';
            // O redirigir: window.location.href = "{{ route('clubes.index') }}";
        })
        .catch(error => {
            console.error('Error:', error);
        });
        */
    });
});
</script>
@endsection