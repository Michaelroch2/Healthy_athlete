@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="margin-bottom: 20px; font-size: 28px; color: #333;">Centrado en el cuerpo</h1>
    
    <!-- Filtros por parte del cuerpo -->
    <div style="margin-bottom: 20px; overflow-x: auto; white-space: nowrap;">
    <a href="{{ route ('deportistas.rutinas', 'abdominales')}}" style="display: inline-block; background-color: #f5f5f5; color: white; padding: 8px 20px; border-radius: 50px; margin-right: 10px; text-decoration: none; font-weight: 500;">Abdominales</a>
        <a href="{{ route ('deportistas.rutinas', 'brazo')}}" style="display: inline-block; background-color: #0d6efd; color: #333; padding: 8px 20px; border-radius: 50px; margin-right: 10px; text-decoration: none; font-weight: 500;">Brazo</a>
        <a href="{{ route ('deportistas.rutinas', 'pecho')}}" style="display: inline-block; background-color: #f5f5f5; color: #333; padding: 8px 20px; border-radius: 50px; margin-right: 10px; text-decoration: none; font-weight: 500;">Pecho</a>
        <a href="{{ route ('deportistas.rutinas', 'pierna')}}" style="display: inline-block; background-color: #f5f5f5; color: #333; padding: 8px 20px; border-radius: 50px; margin-right: 10px; text-decoration: none; font-weight: 500;">Pierna</a>
        <a href="{{ route ('deportistas.rutinas', 'espalda')}}" style="display: inline-block; background-color: #f5f5f5; color: #333; padding: 8px 20px; border-radius: 50px; margin-right: 10px; text-decoration: none; font-weight: 500;">Espalda</a>
        <a href="{{ route ('deportistas.rutinas', 'hombros')}}" style="display: inline-block; background-color: #f5f5f5; color: #333; padding: 8px 20px; border-radius: 50px; margin-right: 10px; text-decoration: none; font-weight: 500;">Hombros</a>
    </div>
    
    <!-- Rutinas -->
    <div>
        <!-- Rutina 1 -->
        <div style="display: flex; padding: 15px 0; border-bottom: 1px solid #eee;">
            <div style="width: 120px; height: 120px; border-radius: 10px; overflow: hidden; flex-shrink: 0;">
                <img src="{{ asset('images/abdominalesprincipiante.jpg') }}" alt="Brazo Principiante" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div style="padding-left: 20px;">
                <h3 style="font-size: 20px; font-weight: 600; margin-bottom: 5px;">Brazo Principiante</h3>
                <div style="color: #666; margin-bottom: 10px;">20 min • 16 Ejercicios</div>
                <div style="color: #0d6efd;">
                    ⚡ ◌ ◌
                </div>
            </div>
        </div>
        
        <!-- Rutina 2 -->
        <div style="display: flex; padding: 15px 0; border-bottom: 1px solid #eee;">
            <div style="width: 120px; height: 120px; border-radius: 10px; overflow: hidden; flex-shrink: 0;">
                <img src="{{ asset('images/abdominalesintermedio.jpg') }}" alt="Abdominales Intermedio" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div style="padding-left: 20px;">
                <h3 style="font-size: 20px; font-weight: 600; margin-bottom: 5px;">Brazo Intermedio</h3>
                <div style="color: #666; margin-bottom: 10px;">29 min • 21 Ejercicios</div>
                <div style="color: #0d6efd;">
                    ⚡ ⚡ ◌
                </div>
            </div>
        </div>
        
        <!-- Rutina 3 -->
        <div style="display: flex; padding: 15px 0; border-bottom: 1px solid #eee;">
            <div style="width: 120px; height: 120px; border-radius: 10px; overflow: hidden; flex-shrink: 0;">
                <img src="{{ asset('images/abdominalesavanzado.jpg') }}" alt="Abdominales Avanzado" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div style="padding-left: 20px;">
                <h3 style="font-size: 20px; font-weight: 600; margin-bottom: 5px;">Brazo Avanzado</h3>
                <div style="color: #666; margin-bottom: 10px;">36 min • 21 Ejercicios</div>
                <div style="color: #0d6efd;">
                    ⚡ ⚡ ⚡
                </div>
            </div>
        </div>
    </div>
    
    <!-- Categoría adicional -->
    <h2 style="margin-top: 30px; font-size: 24px; color: #333;">Brazo</h2>
    
    <!-- Filtros adicionales -->
    <div style="margin-top: 30px;">
        <a href="#" style="display: inline-block; background-color: #f5f5f5; color: #333; padding: 8px 20px; border-radius: 50px; margin-right: 10px; margin-bottom: 10px; text-decoration: none; font-weight: 500;">Reciente</a>
        <a href="#" style="display: inline-block; background-color: #f5f5f5; color: #333; padding: 8px 20px; border-radius: 50px; margin-right: 10px; margin-bottom: 10px; text-decoration: none; font-weight: 500;">Calentamiento</a>
        <a href="#" style="display: inline-block; background-color: #f5f5f5; color: #333; padding: 8px 20px; border-radius: 50px; margin-right: 10px; margin-bottom: 10px; text-decoration: none; font-weight: 500;">7-15 min</a>
        <a href="#" style="display: inline-block; background-color: #f5f5f5; color: #333; padding: 8px 20px; border-radius: 50px; margin-right: 10px; margin-bottom: 10px; text-decoration: none; font-weight: 500;">Principiante</a>
        <a href="#" style="display: inline-block; background-color: #f5f5f5; color: #333; padding: 8px 20px; border-radius: 50px; margin-right: 10px; margin-bottom: 10px; text-decoration: none; font-weight: 500;">Intermedio</a>
        <a href="#" style="display: inline-block; background-color: #f5f5f5; color: #333; padding: 8px 20px; border-radius: 50px; margin-right: 10px; margin-bottom: 10px; text-decoration: none; font-weight: 500;">Estirar</a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Script para manejar la selección de filtros
    document.addEventListener('DOMContentLoaded', function() {
        const pills = document.querySelectorAll('.filter-pill');
        
        pills.forEach(pill => {
            pill.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Para los filtros de parte del cuerpo, deseleccionar otros
                if (this.closest('.body-part-filter')) {
                    document.querySelectorAll('.body-part-filter .filter-pill').forEach(p => {
                        p.classList.remove('active');
                    });
                    this.classList.add('active');
                } 
                // Para los filtros inferiores, toggle individual
                else {
                    this.classList.toggle('active');
                }
            });
        });
    });
</script>
@endsection