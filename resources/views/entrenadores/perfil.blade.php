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
    <h1>Perfil del Entrenador</h1>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-4">
                <div class="card-header">Información Personal</div>
                <div class="card-body">
                    <p><strong>Nombre:</strong> {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Edad:</strong> {{ Auth::user()->edad }}</p>
                    <!-- Agrega más datos del usuario si tienes -->
                </div>
            </div>
            
            <div class="card mt-4">
                <div class="card-header">Fotografía de Perfil</div>
                <div class="card-body">
                    @if(Auth::user()->profile_photo)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Foto de perfil" class="img-thumbnail" style="max-width: 200px;">
                        </div>
                    @endif
                    
                    <form action="{{ route('profile.updatePhoto') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="profile_photo" class="form-label">Subir Foto</label>
                            <input type="file" class="form-control" id="profile_photo" name="profile_photo" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar foto</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
    <div class="card mt-4">
        <div class="card-header">¿En qué deporte te especializas?</div>
        <div class="card-body">
            <form id="sports-form" action="javascript:void(0);">
                @csrf
                <div class="alert alert-info">
                    Puedes seleccionar hasta 3 deportes
                </div>
                
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="futbol" id="deporte_futbol" name="deportes[]" {{ in_array('futbol', $userSports ?? []) ? 'checked' : '' }}>
                        <label class="form-check-label" for="deporte_futbol">Fútbol</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="baloncesto" id="deporte_baloncesto" name="deportes[]" {{ in_array('baloncesto', $userSports ?? []) ? 'checked' : '' }}>
                        <label class="form-check-label" for="deporte_baloncesto">Baloncesto</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="natacion" id="deporte_natacion" name="deportes[]" {{ in_array('natacion', $userSports ?? []) ? 'checked' : '' }}>
                        <label class="form-check-label" for="deporte_natacion">Natación</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="ciclismo" id="deporte_ciclismo" name="deportes[]" {{ in_array('ciclismo', $userSports ?? []) ? 'checked' : '' }}>
                        <label class="form-check-label" for="deporte_ciclismo">Ciclismo</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="running" id="deporte_running" name="deportes[]" {{ in_array('running', $userSports ?? []) ? 'checked' : '' }}>
                        <label class="form-check-label" for="deporte_running">Running</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="tenis" id="deporte_tenis" name="deportes[]" {{ in_array('tenis', $userSports ?? []) ? 'checked' : '' }}>
                        <label class="form-check-label" for="deporte_tenis">Tenis</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="voleibol" id="deporte_voleibol" name="deportes[]" {{ in_array('voleibol', $userSports ?? []) ? 'checked' : '' }}>
                        <label class="form-check-label" for="deporte_voleibol">Voleibol</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="yoga" id="deporte_yoga" name="deportes[]" {{ in_array('yoga', $userSports ?? []) ? 'checked' : '' }}>
                        <label class="form-check-label" for="deporte_yoga">Yoga</label>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Guardar deportes</button>
            </form>
            
            <div id="success-message" class="alert alert-success mt-3 text-center" style="display: none;">
                <h4>Guardado exitosamente</h4>
            </div>
        </div>
    </div>
</div>


    
    
</div>

<script>

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('sports-form');
    const successMessage = document.getElementById('success-message');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validar máximo 3 deportes
        const checkboxes = form.querySelectorAll('input[type="checkbox"]:checked');
        if (checkboxes.length > 3) {
            alert('Solo puedes seleccionar hasta 3 deportes.');
            return;
        }
        
        // Ocultar el formulario
        form.style.display = 'none';
        
        // Mostrar mensaje de éxito
        successMessage.style.display = 'block';
    });
});
</script>
@endsection