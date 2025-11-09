<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema Web de Control de Pasantías — Tailwind + Alpine</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @livewireScripts;
    @vite(['resources/css/style.css', 'resources/js/script.js'])
</head>

<body>
    <!-- Botón del menú -->
    <div class="menu-btn" onclick="toggleMenu()">
        <i class="fa-solid fa-bars"></i>
    </div>

    <!-- Menú lateral -->
    <livewire:layout.menu-navigation></livewire:layout.menu-navigation>

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
