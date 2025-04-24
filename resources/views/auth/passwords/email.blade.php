@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="form-box">
        <h5>Cambiar Contraseña</h5>
        
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('password.email') }}">
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

            <button type="submit" class="login-btn">
                {{ __('Enviar Enlace') }}
            </button>
            
            <div class="back-section">
                <a href="{{ route('login') }}" class="back-link">
                    Volver a inicio de sesión
                </a>
            </div>
        </form>
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
    
    .back-section {
        margin-top: 20px;
    }
    
    .back-link {
        color: #007BFF;
        cursor: pointer;
        text-decoration: none;
    }
    
    .back-link:hover {
        text-decoration: underline;
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
    
    .card {
        background: none;
        border: none;
    }
</style>
@endsection