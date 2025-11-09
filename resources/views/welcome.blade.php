<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="overscroll-none scroll-smooth">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Sistema de Gestión de Pasantías - Universidad Salesiana de Bolivia</title>

  <!-- Styles -->
  @vite(['resources/js/app.js', 'resources/css/app.css', ])
</head>

<body>
  <header>
    <x-layout.nav-bar></x-layout.nav-bar>
    <x-layout.hero></x-layout.hero>
    <x-layout.info></x-layout.info>
    {{-- <nav class="p-4 text-black">
      @if (Route::has('login'))
        <livewire:welcome.navigation />
      @endif
    </nav> --}}


  </header>
  <main>

  </main>
  <footer>

  </footer>
</body>

</html>
