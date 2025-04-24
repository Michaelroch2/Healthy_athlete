@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #FFA500;
        padding: 20px 0;
    }
    .form-box {
        width: 95%;
        max-width: 500px;
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        text-align: center;
        color: black;
        margin: 20px auto;
    }
    .form-box h2, .form-box h3 {
        margin-bottom: 15px;
        color: #333;
    }
    .form-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-bottom: 12px;
    }
    .form-col {
        width: 48%;
    }
    .form-group {
        margin-bottom: 12px;
        text-align: left;
    }
    .form-box label {
        display: block;
        text-align: left;
        margin-bottom: 4px;
        font-size: 14px;
        color: #555;
    }
    .form-box input, .form-box select {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        transition: border-color 0.3s;
        box-sizing: border-box;
        height: 36px;
    }
    .form-box input:focus, .form-box select:focus {
        outline: none;
        border-color: #FFA500;
        box-shadow: 0 0 3px rgba(255, 165, 0, 0.3);
    }
    .form-box button, .form-box .btn {
        background-color: #FFA500;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 15px;
        transition: background-color 0.2s;
        margin-top: 15px;
        width: 200px;
    }
    .form-box button:hover, .form-box .btn:hover {
        background-color: #e69500;
    }
    .error {
        color: red;
        font-size: 12px;
        margin-top: 2px;
        text-align: left;
    }
    .hidden {
        display: none;
    }
    footer {
        margin-top: 20px;
        color: #666;
        font-size: 12px;
    }
    
    @media (max-width: 576px) {
        .form-col {
            width: 100%;
        }
    }
</style>

<div class="form-box" id="registrationBox">
    <h2>Healthy Athlete</h2>
    <form method="POST" action="{{ route('register') }}" id="registrationForm">
        @csrf

        <!-- Nombre y Apellido -->
        <div class="form-row">
            <div class="form-col">
                <div class="form-group">
                    <label for="nombre">{{ __('Nombre') }}:</label>
                    <input id="nombre" type="text" class="@error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus maxlength="25">
                    @error('nombre')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-col">
                <div class="form-group">
                    <label for="apellido">{{ __('Apellido') }}:</label>
                    <input id="apellido" type="text" class="@error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" required maxlength="25">
                    @error('apellido')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Fecha de Nacimiento y Edad (Intercambiados) -->
        <div class="form-row">
            <div class="form-col">
                <div class="form-group">
                    <label for="fecha_nacimiento">{{ __('Fecha de Nacimiento') }}:</label>
                    <input id="fecha_nacimiento" type="date" class="@error('fecha_nacimiento') is-invalid @enderror" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
                    @error('fecha_nacimiento')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-col">
                <div class="form-group">
                    <label for="edad">{{ __('Edad') }}:</label>
                    <input id="edad" type="number" class="@error('edad') is-invalid @enderror" name="edad" value="{{ old('edad') }}" required readonly>
                    @error('edad')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Tipo y Número de Documento -->
        <div class="form-row">
            <div class="form-col">
                <div class="form-group">
                    <label for="tipo_documento">{{ __('Tipo de documento') }}:</label>
                    <select id="tipo_documento" name="tipo_documento" class="@error('tipo_documento') is-invalid @enderror" required>
                        <option value="">Seleccione</option>
                        <option value="CC" {{ old('tipo_documento') == 'CC' ? 'selected' : '' }}>Cédula de Ciudadanía</option>
                        <option value="TI" {{ old('tipo_documento') == 'TI' ? 'selected' : '' }}>Tarjeta de Identidad</option>
                        <option value="CE" {{ old('tipo_documento') == 'CE' ? 'selected' : '' }}>Cédula de Extranjería</option>
                        <option value="PAS" {{ old('tipo_documento') == 'PAS' ? 'selected' : '' }}>Pasaporte</option>
                    </select>
                    <span id="documento_edad_error" class="error"></span>
                    @error('tipo_documento')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-col">
                <div class="form-group">
                    <label for="numero_documento">{{ __('Número de documento') }}:</label>
                    <input id="numero_documento" type="text" class="@error('numero_documento') is-invalid @enderror" name="numero_documento" value="{{ old('numero_documento') }}" required minlength="8" maxlength="12" pattern=".{8,}" title="El número de documento debe tener al menos 8 dígitos">
                    <span id="document_error" class="error"></span>
                    @error('numero_documento')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Correo y Género -->
        <div class="form-row">
            <div class="form-col">
                <div class="form-group">
                    <label for="email">{{ __('Correo electrónico') }}:</label>
                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-col">
                <div class="form-group">
                    <label for="genero">{{ __('Género') }}:</label>
                    <select id="genero" name="genero" class="@error('genero') is-invalid @enderror" required>
                        <option value="">Seleccione</option>
                        <option value="masculino" {{ old('genero') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                        <option value="femenino" {{ old('genero') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                    </select>
                    @error('genero')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Contraseña y Confirmación -->
        <div class="form-row">
            <div class="form-col">
                <div class="form-group">
                    <label for="password">{{ __('Contraseña') }}:</label>
                    <input id="password" type="password" 
    class="@error('password') is-invalid @enderror" 
    name="password" required autocomplete="new-password"
    pattern="^(?=.*[A-Z])(?=.*\d).{8,}$"
    title="La contraseña debe tener al menos 8 caracteres, una letra mayúscula y un número.">
                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-col">
                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirmar Contraseña') }}:</label>
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                    <span id="password_error" class="error"></span>
                </div>
            </div>
        </div>

        <!-- Tipo de Usuario -->
        <div class="form-row">
            <div class="form-col">
                <div class="form-group">
                    <label for="cod_tipo_fk">{{ __('Selecciona tu rol') }}:</label>
                    <select id="cod_tipo_fk" name="cod_tipo_fk" class="@error('cod_tipo_fk') is-invalid @enderror" required>
                        <option value="">Seleccione</option>
                        <option value="D" {{ old('cod_tipo_fk') == 'D' ? 'selected' : '' }}>Deportista</option>
                        <option value="E" {{ old('cod_tipo_fk') == 'E' ? 'selected' : '' }}>Entrenador</option>
                    </select>
                    @error('cod_tipo_fk')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <button type="submit" class="btn">
            {{ __('Registrar') }}
        </button>
        <footer>©HealthyAthlete2024</footer>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const edadInput = document.getElementById('edad');
        const fechaNacimientoInput = document.getElementById('fecha_nacimiento');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password-confirm');
        const numeroDocumentoInput = document.getElementById('numero_documento');
        const tipoDocumentoSelect = document.getElementById('tipo_documento');
        const registrationForm = document.getElementById('registrationForm');
        const passwordError = document.getElementById('password_error');
        const documentError = document.getElementById('document_error');
        const documentoEdadError = document.getElementById('documento_edad_error');

        // Calcular edad en base a fecha de nacimiento
        fechaNacimientoInput.addEventListener('change', calcularEdad);

        function calcularEdad() {
            const birthDate = new Date(fechaNacimientoInput.value);
            if (isNaN(birthDate.getTime())) return;

            const today = new Date();
            let calculatedAge = today.getFullYear() - birthDate.getFullYear();

            if (
                today.getMonth() < birthDate.getMonth() ||
                (today.getMonth() === birthDate.getMonth() && today.getDate() < birthDate.getDate())
            ) {
                calculatedAge--;
            }

            edadInput.value = calculatedAge;
            
            // Validar el tipo de documento según la edad calculada
            validateDocumentType();
        }

        // Validar el tipo de documento según la edad
        function validateDocumentType() {
            const edad = parseInt(edadInput.value);
            const tipoDocumento = tipoDocumentoSelect.value;
            
            if (isNaN(edad)) return;
            
            if (edad < 18 && tipoDocumento === 'CC') {
                documentoEdadError.textContent = 'Los menores de edad no pueden tener Cédula de Ciudadanía';
                return false;
            } else if (edad >= 18 && tipoDocumento === 'TI') {
                documentoEdadError.textContent = 'Los mayores de edad no pueden tener Tarjeta de Identidad';
                return false;
            } else {
                documentoEdadError.textContent = '';
                return true;
            }
        }

        // Validar que la contraseña coincida con la confirmación
        function validatePasswordMatch() {
            if (passwordInput.value !== confirmPasswordInput.value) {
                passwordError.textContent = 'Las contraseñas no coinciden';
                return false;
            } else {
                passwordError.textContent = '';
                return true;
            }
        }

        // Validar que el número de documento tenga al menos 8 dígitos
        function validateDocumentNumber() {
            if (numeroDocumentoInput.value.length < 8) {
                documentError.textContent = 'El número de documento debe tener al menos 8 dígitos';
                return false;
            } else {
                documentError.textContent = '';
                return true;
            }
        }

        // Eventos para validaciones en tiempo real
        passwordInput.addEventListener('input', validatePasswordMatch);
        confirmPasswordInput.addEventListener('input', validatePasswordMatch);
        numeroDocumentoInput.addEventListener('input', validateDocumentNumber);
        tipoDocumentoSelect.addEventListener('change', validateDocumentType);
        
        // Si hay una edad ya establecida al cargar la página, validar el tipo de documento
        if (edadInput.value) {
            validateDocumentType();
        }

        // Validar todo el formulario antes de enviar
        registrationForm.addEventListener('submit', function(e) {
            const isPasswordValid = validatePasswordMatch();
            const isDocumentValid = validateDocumentNumber();
            const isDocumentTypeValid = validateDocumentType();
            
            if (!isPasswordValid || !isDocumentValid || !isDocumentTypeValid) {
                e.preventDefault(); // Detener el envío del formulario si hay errores
            }
        });
    });
    
</script>
@endsection