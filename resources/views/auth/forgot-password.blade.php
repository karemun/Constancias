@extends('layouts.app')

@section('title')
    Olvidaste tu Contraseña
@endsection

@section('content')

    <div class="mt-24 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-2 px-6 py-12 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="mb-4 text-sm text-gray-600">
                {{ __('¿Olvidaste tu contraseña? Coloca tu email de registro y enviaremos un enlace para crear una nueva contraseña.') }}
            </div>
        
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
        
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
        
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <div class="flex justify-between my-5">
                    <x-link :href="route('login')">
                        Iniciar Sesión
                    </x-link>
        
                    <x-link :href="route('register')">
                        Crear Cuenta
                    </x-link>
                </div>
        
                <x-primary-button class="w-full justify-center">
                    {{ __('Enviar Email') }}
                </x-primary-button>
        
            </form>
        </div>
    </div>

@endsection