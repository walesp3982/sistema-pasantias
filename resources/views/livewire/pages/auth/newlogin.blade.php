<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.register')] class extends Component {
  public LoginForm $form;

  /**
   * Handle an incoming authentication request.
   */
  public function login(): void
  {
    $this->validate();

    $this->form->authenticate();

    Session::regenerate();

    $this->redirect(route(name: 'dashboard'), navigate: true);
  }
}; ?>



<div class="flex flex-col lg:flex-row w-full max-w-5xl bg-white rounded-3xl shadow-lg overflow-hidden">

  <!-- Panel Izquierdo: Login -->
  <div class="flex justify-center items-center w-full lg:w-1/2 p-8 md:p-12">
    <div class="w-full max-w-md">
      <h1 class="text-3xl font-bold text-gray-800 mb-6">Login</h1>

      <form wire:submit="login">
        @csrf
        <!-- Dirección de correo-->
        <div class="mb-4">
          <label for="email" class="block text-gray-600 mb-2">Correo electrónico</label>
          <input wire:model="form.email" type="email" id="email"
            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
        </div>
        <!-- Contraseña-->
        <div class="mb-4">
          <label for="password" class="block text-gray-600 mb-2">Contraseña</label>
          <input wire:model="form.password" type="password" id="password"
            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <div class="block mt-4">
          <label for="remember" class="inline-flex items-center">
            <input wire:model="form.remember" id="remember" type="checkbox"
              class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
          </label>
        </div>

        <div class="text-center mt-6">
          <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
            Iniciar sesión
          </button>
          <a href="{{ route('password.request') }}" class="block mt-3 text-blue-600 hover:underline text-sm">¿Olvidaste
            tu contraseña?</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Panel Derecho: Misión y Visión -->
  <div
    class="hidden lg:flex items-center justify-center w-1/2 bg-gradient-to-br from-blue-600 to-blue-800 text-white p-10">
    <div>
      <h4 class="text-2xl font-semibold mb-4">Misión</h4>
      <p class="text-sm mb-6">
        Formar profesionales competentes, buenos cristianos y honrados ciudadanos,
        contribuyendo al desarrollo social y cultural del país.
      </p>
      <h4 class="text-2xl font-semibold mb-4">Visión</h4>
      <p class="text-sm">
        Ser reconocida como una institución educativa de excelencia y formación humana,
        un centro de referencia académica, espiritual y cultural.
      </p>
    </div>
  </div>

</div>