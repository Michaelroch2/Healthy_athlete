@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="form-box">
        <h2>Inicio de Sesión</h2>
        
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">{{ __('Correo Electrónico') }}:</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">{{ __('Contraseña') }}:</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="login-btn">
                {{ __('Iniciar Sesión') }}
            </button>
            
            @if (Route::has('password.request'))
                <a class="forgot-password" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif
        </form>

        <div class="register-section">
            <p>¿No tienes una cuenta?</p>
            <a href="{{ route('register') }}">
                <button type="button" class="register-btn">Registrarse</button>
            </a>
        </div>
    </div>
</div>



<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #FFA500;
    }
    
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }
    
    .form-box {
        width: 90%;
        max-width: 400px;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-align: center;
        color: black;
    }
    
    .form-box h2 {
        margin-bottom: 20px;
    }
    
    .form-group {
        margin-bottom: 15px;
        text-align: left;
    }
    
    .form-box label {
        display: block;
        text-align: left;
        margin: 10px 0 5px;
    }
    
    .form-control {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    
    .invalid-feedback {
        color: #e3342f;
        display: block;
        margin-top: 5px;
        font-size: 0.85em;
    }
    
    .login-btn {
        background-color: #286afa;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        margin-top: 10px;
    }
    
    .login-btn:hover {
        background-color: #e64a19;
    }
    
    .forgot-password {
        color: #007BFF;
        cursor: pointer;
        display: block;
        margin-top: 15px;
        text-decoration: none;
    }
    
    .forgot-password:hover {
        text-decoration: underline;
    }
    
    .register-section {
        margin-top: 30px;
        border-top: 1px solid #eee;
        padding-top: 20px;
    }
    
    .register-section p {
        margin: 0 0 10px 0;
        color: #555;
    }
    
    .register-btn {
        background-color: #ffa726;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
    }
    
    .register-btn:hover {
        background-color: #fb8c00;
    }
    
    .alert {
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
    }
    
    .alert-success {
        background-color: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
    }
    
    /* Sobreescribir estilos de app.blade.php si es necesario */
    .navbar, .app-header {
        display: none; /* Ocultar la barra de navegación si existe */
    }
    
    .container {
        margin: 0;
        padding: 0;
        max-width: none;
    }
</style>
@endsection