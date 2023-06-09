<!-- PRINCIPAL -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Prepa 11 - @yield('title')</title>
        
        <!-- Scripts -->
        @stack('styles')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased">
        <!-- Page Heading -->
        <div class="min-h-screen bg-gray-100">
            <header class="bg-udg text-white">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex items-center">
                    <img src="{{ asset('img/logo_udg.png') }}" alt="Logo de UDG" class="w-14 h-14 mr-1">
                    <h2 class="font-semibold text-xl text-gray-300 leading-tight">
                        Preparatoria 11
                    </h2>
                </div>
            </header>

            <nav class="bg-white border-b border-gray-100 shadow">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="container mx-auto flex justify-between items-center h-16">
                        
                        <div class="sm:flex sm:items-center sm:ml-6">
                            <a href="/" class="px-3 py-2 text-gray-800 hover:text-gray-500 font-semibold mr-8">Inicio</a>
                            <a href="{{ route('calendario.index') }}" class="px-3 py-2 duration-150 text-gray-800 hover:text-gray-500">Calendario</a>
                        </div>
                        

                        <div class="flex gap-2 items-center">
                            @auth
                                <a href="{{route('profile.account.index')}}" class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm font-bold cursor-pointer">
                                    <!-- Icon SVG from Heroicons -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                    </svg>
                                    Agregar Cuenta
                                </a>
                                <!-- Settings Dropdown -->
                                <div class="flex items-center ml-6">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                <div>{{ Auth::user()->name }}</div>

                                                <div class="ml-1">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('profile.edit')">
                                                {{ __('Perfil') }}
                                            </x-dropdown-link>

                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <x-dropdown-link :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                    {{ __('Salir') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="flex items-center gap-2 p-2 text-sm font-semibold text-gray-800 hover:text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    Iniciar sesión
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>
            

            <!-- Page Content -->
            <main class="container mx-auto mt-10">
                <h2 class="font-bold text-center text-3xl mb-10">
                    @yield('title')
                </h2>
                @yield('content')
            </main>
    
            <!-- Footer -->
            <footer class="bg-gray-300 mt-52 text-center p-8 text-gray-500 font-bold">
                Universidad de Guadalajara {{ now()->year }}
            </footer>
        </div>
        @stack('script')
    </body>
</html>
