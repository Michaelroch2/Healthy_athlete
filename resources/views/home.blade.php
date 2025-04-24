@extends('layouts.app')

@section('content')
<style>
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color:rgb(231, 184, 97);
    }

    .content {
        flex: 1;
        padding: 30px;
        text-align: center;
        background-color: #FFE5B4;
    }

    header {
        background-color: #FFA500;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
    }

    nav {
        display: flex;
        gap: 20px;
    }

    nav a {
        color: white;
        text-decoration: none;
        font-weight: bold;
    }

    nav a:hover {
        text-decoration: underline;
    }

    h2 {
        color: rgb(22, 134, 238);
    }

    .social-links {
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    p {
        margin: 4%;
        text-align: center;
    }

    hr {
        width: 100%;
    }
</style>
<body>
    

<div class="main-wrapper">
    <div class="content">
        <h2>
            @if (Auth::user()->cod_tipo_fk == 'A')
                ¡Bienvenido Administrador!
            @elseif (Auth::user()->cod_tipo_fk == 'E')
                ¡Bienvenido Entrenador!
            @elseif (Auth::user()->cod_tipo_fk == 'D')
                ¡Bienvenido Deportista!
            @endif
        </h2>

        @if (Auth::user()->cod_tipo_fk == 'A')
        <p>Aquí puedes gestionar deportistas y entrenadores.</p>
        
        <p>El bienestar de nuestros deportistas es de suma prioridad. Entrenadores y deportistas deben usar nuestro sistema con responsabilidad y evitar ofender a los otros usuarios ayudalos a cumplir sus metas.<br>
            Contamos contigo en responsabilidad con los usuarios.</p>
        <hr>
        
        <h2>Administra</h2>
        <p>Nos alegra que estés aquí. Explora los CRUD y revisa quienes estan haciendo mal uso del sistema nuestra comunidad te necesita para llevar un estilo de vida saludable.<br>
            </p>
        
        @elseif (Auth::user()->cod_tipo_fk == 'E')
        <p>Aquí puedes gestionar tu perfil, rutinas, y más.</p>
        
        <p>Tu bienestar es nuestra prioridad. Descubre rutinas de ejercicios y planes de dieta personalizados para alcanzar tus metas.<br>
            Contamos contigo como un entrenador capacitado que apoya en cada paso a los deportistas.</p>

            <p>Crea tu propio club y agrgales clases donde los deportistas puedan estar agusto</p>
        <hr>
        
        <h2>Entrena con Nosotros</h2>
        <p>Nos alegra que estés aquí. Explora nuestros cursos y únete a nuestra comunidad para llevar un estilo de vida saludable.<br>
            ÚNETE A LA EXPERIENCIA DE ENTRENAR A TU RITMO</p>
        

        @elseif (Auth::user()->cod_tipo_fk == 'D')
        <p>Aquí puedes gestionar tu perfil, rutinas, y más.</p>
        
        <p>Tu bienestar es nuestra prioridad. Descubre rutinas de ejercicios y planes de dieta personalizados para alcanzar tus metas.<br>
            Contamos con entrenadores capacitados que apoyan en cada paso del camino.</p>
        <hr>
        
        <h2>Entrena con Nosotros</h2>
        <p>Nos alegra que estés aquí. Explora nuestros cursos y únete a nuestra comunidad para llevar un estilo de vida saludable.<br>
            ÚNETE A LA EXPERIENCIA DE ENTRENAR A TU RITMO</p>
        
        @endif
    </div>

    
</div>
</body>
@endsection
