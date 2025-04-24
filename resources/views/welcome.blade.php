<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Healthy Athlete</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #FFA500; 
            color:rgb(0, 0, 0);
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background-color:rgb(255, 255, 255);
        }
        header img {
            height: 30px;
        }
        header nav a {
            text-decoration: none;
            color: #000000;
            margin-left: 20px;
            font-size: 16px;
        }
        header .auth-buttons a {
            color: #286afa;
            font-weight: bold;
        }
        .main-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 50px 10%;
            
            color:rgb(255, 255, 255);
        }
        .image-container img {
            max-width: 100%;
            height: auto;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .text-content {
            max-width: 45%;
            text-align: right;
        }
        .text-content h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .text-content p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }
        .register-btn {
            display: inline-block;
            background-color: #286afa;
            color: #ffffff;
            font-weight: bold;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.1em;
            margin-right: 10px;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #ffffff;
        }

        /* Estilo para la sección "Sobre Nosotros" */
        .about-section {
            display: flex;
            justify-content: center;
            padding: 80px 10%;
            
            color: #000000;
            text-align: center;
        }
        .about-left {
            width: 100%;
            margin-bottom: 30px;
        }
        .about-right {
            width: 100%;
            text-align: justify;
        }
        .about-left h2 {
            color:rgb(255, 255, 255);
            font-size: 3em;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .about-left p {
            font-size: 1.5em;
            margin-bottom: 40px;
        }
        .about-right h3 {
            font-size: 2em;
            color:rgb(255, 255, 255);
            margin-bottom: 15px;
        }
        .about-right p {
            font-size: 1.2em;
            margin-bottom: 25px;
        }
        
    </style>
</head>
<body>
    <header>
        <div>
        <marquee>Healthy Athlete</marquee>
        </div>
        <nav>
        </nav>
        <div class="auth-buttons">
            <a href="{{ url('register') }}" style="margin-right: 15px">Regístrate</a><a href="{{ url('login') }}">Iniciar sesión</a>
        </div>
    </header>

    <main class="main-content">
        <div class="image-container">
            <img src="{{ asset('images/9_griffin.gif') }}" alt="Vista previa de Healthy Athlete"> 
        </div>
        <div class="text-content">
            <h1>Bienvenido a Healthy Athlete. Alcanza tus metas fitness.</h1>
            <p>
                Únete a nuestra comunidad y disfruta de rutinas de ejercicios, planes de dietas personalizadas con apoyo de entrenadores capacitados.
                ¡Vuelvete el mejor en tu deporte favorito!
            </p>
            <a href="{{ url('register') }}" class="register-btn btn-sm mb-2">REGÍSTRARSE</a>
            <a href="{{ url('login') }}" class="register-btn btn-sm">INICIA SESION</a>
        </div>
    </main>

    <!-- Sección "Sobre Nosotros" -->
    <section class="about-section">
        <div class="about-left"><br><br><br><br><br><br><br><br><br><br><br>
            <h2>Sobre Nosotros</h2>
            <p>En Healthy Athlete, creemos que un atleta saludable es un atleta imparable. Nuestra plataforma fue creada con el propósito de acompañar a deportistas, entrenadores y clubes en su camino hacia el alto rendimiento y el bienestar integral.</p>
        </div>
        <div class="about-right">
            <h3>Historia 💡</h3>
            <p><strong>Nuestra Historia:</strong> Saludable Atleta nace de la pasión por el deporte y la necesidad de centralizar el seguimiento deportivo en una plataforma intuitiva, moderna y accesible. Sabemos que el camino del atleta no siempre es fácil, por eso creamos un espacio donde cada esfuerzo cuente, donde cada avance se registre, y donde cada usuario tenga las herramientas necesarias para crecer.</p>

            <h3>🤝 Nuestro Equipo</h3>
            <p>Estamos conformados por profesionales del deporte, la nutrición y la tecnología. Trabajamos con un mismo objetivo: apoyar a cada deportista y entrenador con soluciones reales, prácticas y eficientes.</p>

            <h3>📬 Contáctanos</h3>
            <p><strong>Escríbenos a:</strong> contacto@healthyathlete.com</p>
            <p><strong>Síguenos en redes sociales</strong> y mantente al día con las novedades, tips y contenido exclusivo.</p>
            Contáctanos por nuestras redes:<br>
        <div class="social-links">
            <a href="https://www.facebook.com">Facebook</a><br><br>
            <a href="https://www.instagram.com">Instagram</a><br><br>
            <a href="https://www.twitter.com">Twitter</a>
        </div>
        </div>
    </section>

    <footer>© Healthy Athlete {{ date('Y') }} - Transformando Vidas</footer>
</body>
</html>
