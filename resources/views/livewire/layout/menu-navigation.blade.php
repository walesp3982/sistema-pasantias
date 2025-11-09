<nav class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <img src="{{Vite::asset("resources/images/logo-usb.png")}}" alt="logo salesiana">
        <h2>Universidad Salesiana de Bolivia</h2>
        <p>Sistema de Control de Pasantías</p>
    </div>
    <ul class="menu">


        <li><a href="#"><i class="fa-solid fa-house"></i> Inicio</a></li>
        @role('student')
        <li><a href="#"><i class="fa-solid fa-house"></i> Pasantía actual</a></li>
        <li><a href="#"><i class="fa-solid fa-house"></i> Buscar pasantía</a></li>
        <li><a href="#"><i class="fa-solid fa-house"></i> Historial pasantía</a></li>
        <li><a href="#"><i class="fa-solid fa-house"></i> Pasantía Postulada</a></li>
        <li><a href="#"><i class="fa-solid fa-house"></i> Notificaciones</a></li>

        @endrole
        <li><a href="#"><i class="fa-solid fa-gear"></i> Configuración</a></li>
    </ul>


    <div class="sidebar-footer">
        <a wire:click="logout"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
    </div>

</nav>
