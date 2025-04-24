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
    <h1 class="mb-4">Clubes Deportivos</h1>
    
    <div class="row mb-4">
       
        <div class="col-md-10">
            <!-- Barra de búsqueda -->
            <form action="" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar clubes..." name="search" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="fas fa-search" ></i> Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="row">
        <!-- Club 1 -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="card-title">Club Atlético Runners</h3>
                    <h5 class="text-muted mb-3">Atletismo</h5>
                    <p class="card-text">Club de atletismo enfocado en carreras de fondo y medio fondo. Entrenamientos para todos los niveles desde principiantes hasta competidores experimentados.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">50 miembros</small>
                        <a href="#" class="btn btn-sm btn-outline-primary">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Club 2 -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="card-title">Colombia Basketball Club(C.B.C)</h3>
                    <h5 class="text-muted mb-3">Baloncesto</h5>
                    <p class="card-text">Club de baloncesto con equipos para todas las edades. Competimos en ligas locales y regionales con entrenadores profesionales y excelentes instalaciones.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">78 miembros</small>
                        <a href="#" class="btn btn-sm btn-outline-primary">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Club 3 -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="card-title">Acuáticos del Sur</h3>
                    <h5 class="text-muted mb-3">Natación</h5>
                    <p class="card-text">Club de natación con programas para todas las edades y niveles. Desde aprendizaje básico hasta preparación para competiciones nacionales e internacionales.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">45 miembros</small>
                        <a href="#" class="btn btn-sm btn-outline-primary">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Club 4 -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="card-title">Futbol Club Victoria</h3>
                    <h5 class="text-muted mb-3">Fútbol</h5>
                    <p class="card-text">Club de fútbol con más de 20 años de historia. Contamos con equipos desde infantiles hasta senior, competimos en todas las categorías regionales.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">120 miembros</small>
                        <a href="#" class="btn btn-sm btn-outline-primary">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Club 5 -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="card-title">Tenis Center</h3>
                    <h5 class="text-muted mb-3">Tenis</h5>
                    <p class="card-text">Club de tenis con instalaciones de primer nivel. Ofrecemos clases individuales y grupales, y organizamos torneos mensuales para socios de todos los niveles.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">65 miembros</small>
                        <a href="#" class="btn btn-sm btn-outline-primary">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Club 6 -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="card-title">Ciclistas Unidos</h3>
                    <h5 class="text-muted mb-3">Ciclismo</h5>
                    <p class="card-text">Club de ciclismo con rutas semanales de diferentes niveles de dificultad. Organizamos viajes y participamos en competiciones de ruta y montaña.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">42 miembros</small>
                        <a href="#" class="btn btn-sm btn-outline-primary">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Navegación de páginas">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Siguiente</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@endsection

@section('styles')
<style>
    .card {
        transition: transform 0.3s, box-shadow 0.3s;
        border-radius: 8px;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .card-title {
        color: #2c3e50;
    }
</style>
@endsection