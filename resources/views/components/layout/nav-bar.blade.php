<header class="py-4 sticky top-0 left-0 w-full bg-white  z-10 shadow-md">
  <nav class="w-full">
    <div class="max-w-6xl mx-auto px-5 flex justify-between  items-center">
      <!-- Logo -->
      <div class="flex items-center">
        <img src="{{ Vite::asset("resources/images/logo-usb.png") }}" alt="Universidad Salesiana de Bolivia" class="h-12 w-auto">
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
          <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-md font-medium hover:bg-blue-700 transition-colors duration-300">Iniciar Sesión</a>
        </li>
      </ul>

      <!-- Botón hamburguesa (móvil) -->
      <div class="flex flex-col justify-center cursor-pointer md:hidden space-y-1.5">
        <span class="block w-6 h-[3px] bg-gray-800 transition-all duration-300"></span>
        <span class="block w-6 h-[3px] bg-gray-800 transition-all duration-300"></span>
        <span class="block w-6 h-[3px] bg-gray-800 transition-all duration-300"></span>
      </div>
    </div>
  </nav>
</header>