<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema Web de Control de Pasantías — Tailwind + Alpine</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    @vite(['resources/css/style.css', 'resources/js/script.js'])
</head>

<body>
    <!-- Botón del menú -->
    <div class="menu-btn" onclick="toggleMenu()">
        <i class="fa-solid fa-bars"></i>
    </div>

    <!-- Menú lateral -->
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <img src="{{Vite::asset("resources/images/logo-usb.png")}}" alt="logo salesiana">
            <h2>Universidad Salesiana de Bolivia</h2>
            <p>Sistema de Control de Pasantías</p>
        </div>

        <ul class="menu">

            <li><a href="#"><i class="fa-solid fa-house"></i> Inicio</a></li>
            <li><a href="#"><i class="fa-solid fa-user-graduate"></i> Estudiantes</a></li>

            <li class="dropdown">
                <a href="#" class="toggle-sub">
                    <i class="fa-solid fa-university logo"></i> Nosotros
                    <i class="fa-solid fa-caret-down"></i>
                </a>
                <ul class="sub-menu">
                    <li><a class="dropdown-item" href="#">Perfil universitario</a></li>
                    <li><a class="dropdown-item" href="#">Mision y vision</a></li>
                </ul>
            </li>


            <li><a href="#"><i class="fa-solid fa-chalkboard-user"></i> Tutores</a></li>
            <li><a href="#"><i class="fa-solid fa-file-lines"></i> Informes</a></li>
            <li><a href="#"><i class="fa-solid fa-list-check"></i> Seguimiento</a></li>
            <li><a href="#"><i class="fa-solid fa-chart-line"></i> Reportes</a></li>
            <li><a href="#"><i class="fa-solid fa-gear"></i> Configuración</a></li>
        </ul>

        <div class="sidebar-footer">
            <a href="#"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
        </div>
    </nav>

    <!-- Encabezado superior -->
    <header class="topbar">
        <div class="topbar-left">
            <h1>Universidad Salesiana de Bolivia</h1>
            <h2>Sistema Web de Control de Pasantías</h2>
        </div>

        <!-- imagen de usuario -->
        <div class="topbar-right">
            <img id="userPhoto" class="user-photo"
                src="https://i.pinimg.com/736x/d9/7b/bb/d97bbb08017ac2309307f0822e63d082.jpg" alt="User">
            <input type="file" id="fileInput" accept="image/*" style="display:none">
        </div>
    </header>

    <!-- Contenido principal -->
    <main>
        {{ $slot }}
    </main>

</body>

</html>