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
    <h1>Perfil del Deportista</h1>
    
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
        
        <div class="card mt-4">
        <div class="card-header">¿Qué deportes practicas?</div>
        <div class="card-body">
            <form id="sports-form" action="javascript:void(0);">
                @csrf
                <div class="alert alert-info">
                    Puedes seleccionar hasta 2 deportes
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

    
    <div class="card mt-4">
        <div class="card-header">¿Quieres calcular tu IMC? (Recomendamos medir peso y altura recientemente)</div>
        <div class="card-body">
            <form id="calculadora-imc">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="peso" class="form-label">Peso (kg)</label>
                            <input type="number" step="0.1" class="form-control" id="peso" placeholder="Ingresa tu peso en kilogramos" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="altura" class="form-label">Altura (m)</label>
                            <input type="number" step="0.01" class="form-control" id="altura" placeholder="Ingresa tu altura en metros" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Calcular IMC</button>
            </form>
            
            <div id="resultado-imc" class="mt-4 d-none">
                <div class="alert alert-success">
                    <h4>Tu IMC: <span id="valor-imc"></span></h4>
                    <p id="interpretacion-imc"></p>
                </div>
                
                <div class="card mt-3">
                    <div class="card-body">
                        <h5>¿Qué significa mi IMC?</h5>
                        <ul>
                            <li><strong>Menos de 18.5:</strong> Bajo peso</li>
                            <li><strong>18.5 - 24.9:</strong> Peso normal (saludable)</li>
                            <li><strong>25.0 - 29.9:</strong> Sobrepeso</li>
                            <li><strong>30.0 - 34.9:</strong> Obesidad grado I</li>
                            <li><strong>35.0 - 39.9:</strong> Obesidad grado II</li>
                            <li><strong>40.0 o más:</strong> Obesidad grado III</li>
                        </ul>
                        <p class="text-muted">El IMC es una medida de referencia, pero no tiene en cuenta factores como la composición corporal, masa muscular o distribución de grasa. Consulta con un profesional de salud para una evaluación completa.</p>
                    </div>
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
        if (checkboxes.length > 2) {
            alert('Solo puedes seleccionar hasta 2 deportes.');
            return;
        }
        
        // Ocultar el formulario
        form.style.display = 'none';
        
        // Mostrar mensaje de éxito
        successMessage.style.display = 'block';
    });
});
    
    // Calculadora de IMC
    const formIMC = document.getElementById('calculadora-imc');
    const resultadoIMC = document.getElementById('resultado-imc');
    const valorIMC = document.getElementById('valor-imc');
    const interpretacionIMC = document.getElementById('interpretacion-imc');
    
    formIMC.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const peso = parseFloat(document.getElementById('peso').value);
        const altura = parseFloat(document.getElementById('altura').value);
        
        if (peso > 0 && altura > 0) {
            // Cálculo del IMC: peso(kg) / altura²(m)
            const imc = peso / (altura * altura);
            
            // Mostrar el resultado con 2 decimales
            valorIMC.textContent = imc.toFixed(2);
            
            // Interpretación del IMC
            let interpretacion = '';
            if (imc < 18.5) {
                interpretacion = 'Tienes bajo peso. Es recomendable consultar con un profesional de la salud.';
            } else if (imc >= 18.5 && imc < 25) {
                interpretacion = '¡Felicidades! Tienes un peso saludable.';
            } else if (imc >= 25 && imc < 30) {
                interpretacion = 'Tienes sobrepeso. Considera incorporar más actividad física y mejorar tu alimentación.';
            } else if (imc >= 30 && imc < 35) {
                interpretacion = 'Tienes obesidad grado I. Te recomendamos consultar con un profesional de la salud.';
            } else if (imc >= 35 && imc < 40) {
                interpretacion = 'Tienes obesidad grado II. Es importante que consultes con un profesional de la salud.';
            } else {
                interpretacion = 'Tienes obesidad grado III. Es muy importante que consultes con un profesional de la salud lo antes posible.';
            }
            
            interpretacionIMC.textContent = interpretacion;
            resultadoIMC.classList.remove('d-none');
        }
    });
});
</script>
@endsection