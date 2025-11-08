<header class="py-4 sticky top-0 left-0 w-full bg-white  z-10 shadow-md">
  <nav class="w-full">
    <div class="max-w-6xl mx-auto px-5 flex justify-between  items-center">
      <!-- Logo -->
      <div class="flex items-center">
        <img src="{{ Vite::asset("resources/images/logo-usb.png") }}" alt="Universidad Salesiana de Bolivia"
          class="h-12 w-auto">
      </div>

      <!-- Menú -->
      <ul class="hidden md:flex list-none">
        <li class="ml-8">
          <a href="#inicio" class="text-gray-600 font-bold hover:text-blue-600 transition-colors duration-300">Inicio</a>
        </li>
        <li class="ml-8">
          <a href="#beneficios" class="text-gray-600 font-bold hover:text-blue-600 transition-colors duration-300">Beneficios</a>
        </li>
        <li class="ml-8">
          <a href="#caracteristicas" class="text-gray-600 font-bold hover:text-blue-600 transition-colors duration-300">Características</a>
        </li>
        <li class="ml-8">
          <a href="#testimonios" class="text-gray-600 font-bold hover:text-blue-600 transition-colors duration-300">Testimonios</a>
        </li>
        <li class="ml-8">
          <a href="#contacto" class="text-gray-600 font-bold hover:text-blue-600 transition-colors duration-300">Contacto</a>
        </li>
        <li class="ml-8">
          <a href="{{ route('newlogin') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md font-medium hover:bg-blue-700 transition-colors duration-300">Iniciar Sesión</a>
        </li>
      </ul>

      <!-- Botón hamburguesa (móvil) -->
      <button id="menuToggle" class="flex flex-col justify-center cursor-pointer md:hidden space-y-1.5 z-20 relative" aria-label="Menú">
        <span id="line1" class="block w-6 h-[3px] bg-gray-800 transition-all duration-300"></span>
        <span id="line2" class="block w-6 h-[3px] bg-gray-800 transition-all duration-300"></span>
        <span id="line3" class="block w-6 h-[3px] bg-gray-800 transition-all duration-300"></span>
      </button>
    </div>
    <!-- Menú móvil -->
    <div id="mobileMenu" class="absolute top-full left-0 w-full bg-white shadow-lg transform -translate-y-full opacity-0 transition-all duration-300 ease-in-out md:hidden overflow-hidden">
      <ul class="flex flex-col px-6 py-4 space-y-2">
        <li>
          <a href="#inicio" class="text-gray-700 font-bold hover:text-blue-600 hover:bg-gray-50 transition-colors duration-300 block py-3 px-2 rounded">Inicio</a>
        </li>
        <li>
          <a href="#beneficios" class="text-gray-700 font-bold hover:text-blue-600 hover:bg-gray-50 transition-colors duration-300 block py-3 px-2 rounded">Beneficios</a>
        </li>
        <li>
          <a href="#caracteristicas" class="text-gray-700 font-bold hover:text-blue-600 hover:bg-gray-50 transition-colors duration-300 block py-3 px-2 rounded">Características</a>
        </li>
        <li>
          <a href="#testimonios" class="text-gray-700 font-bold hover:text-blue-600 hover:bg-gray-50 transition-colors duration-300 block py-3 px-2 rounded">Testimonios</a>
        </li>
        <li>
          <a href="#contacto" class="text-gray-700 font-bold hover:text-blue-600 hover:bg-gray-50 transition-colors duration-300 block py-3 px-2 rounded">Contacto</a>
        </li>
        <li class="pt-2">
          <a href="#" class="bg-blue-600 text-white px-4 py-3 rounded-md font-medium hover:bg-blue-700 transition-colors duration-300 block text-center">Iniciar Sesión</a>
        </li>
      </ul>
    </div>

  </nav>

   <script>
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const line1 = document.getElementById('line1');
    const line2 = document.getElementById('line2');
    const line3 = document.getElementById('line3');
    const menuLinks = mobileMenu.querySelectorAll('a');

    function toggleMenu() {
      const isOpen = mobileMenu.classList.contains('translate-y-0');
      
      if (isOpen) {
        closeMenu();
      } else {
        openMenu();
      }
    }

    function openMenu() {
      mobileMenu.classList.remove('-translate-y-full', 'opacity-0');
      mobileMenu.classList.add('translate-y-0', 'opacity-100');
    
    }

    function closeMenu() {
      mobileMenu.classList.remove('translate-y-0', 'opacity-100');
      mobileMenu.classList.add('-translate-y-full', 'opacity-0');
      
      // Animación del botón X a hamburguesa
      line1.style.transform = '';
      line2.style.opacity = '1';
      line3.style.transform = '';
    }

    menuToggle.addEventListener('click', toggleMenu);
    
    // Cerrar menú al hacer clic en un enlace
    menuLinks.forEach(link => {
      link.addEventListener('click', closeMenu);
    });

    // Cerrar menú al hacer clic fuera
    document.addEventListener('click', (e) => {
      if (!menuToggle.contains(e.target) && !mobileMenu.contains(e.target)) {
        closeMenu();
      }
    });
  </script>
</header>