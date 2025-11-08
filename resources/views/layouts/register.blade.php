<!doctype html>
<html lang="es">
<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <header class="py-4 sticky top-0 left-0 w-full bg-white  z-10 shadow-md">
        <nav class="w-full">
            <div class="max-w-6xl mx-auto px-5 flex justify-between  items-center">
                <!-- Logo -->
                <div class="flex items-center">
                    <img src="{{ Vite::asset("resources/images/logo-usb.png") }}" alt="Universidad Salesiana de Bolivia"
                        class="h-12 w-auto">
                </div>

                <!-- Menú -->
                <button>
                    <a href="{{ route('welcome') }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md font-medium hover:bg-blue-700 transition-colors duration-300">Pagina
                        principal</a>
                </button>
            </div>
        </nav>
    </header>

    <section class="h-[calc(100vh-80px)] flex items-center justify-center bg-gray-100">
        {{ $slot }}
    </section>

     @livewireScripts
    
    <script>
        // Prevenir caché del navegador en páginas de autenticación
        window.onpageshow = function(event) {
            if (event.persisted || 
                (window.performance && window.performance.navigation.type === 2)) {
                window.location.reload();
            }
        };
    </script>
    {{-- <script>
        // Interceptar errores de Livewire
        document.addEventListener('livewire:init', () => {
            Livewire.hook('request', ({ fail }) => {
                fail(({ status, preventDefault }) => {
                    // Si es error 419 (CSRF token expirado)
                    if (status === 419) {
                        preventDefault();
                        
                        // Mostrar mensaje opcional
                        alert('Tu sesión ha expirado. La página se recargará.');
                        
                        // Recargar la página
                        window.location.reload();
                    }
                });
            });
        });
    </script> --}}

</html>