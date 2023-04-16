@extends('layouts.app')

@section('title')
    Registrar Evento
@endsection

@section('content')

    <div class="mt-24 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <form method="POST" action="{{ route('event.store') }}">
                @csrf

                <div class="container mx-auto mt-5">
                    <h2 class="font-bold text-center text-xl mb-10 text-gray-600">
                        Datos del solicitante
                    </h2>
                </div>

                <!-- Nombre solicitante -->
                <div>
                    <x-input-label for="nombre" :value="__('Nombre')" />
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required/>
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Correo electronico')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Asegurate de escribir un correo electronico valido, ya que ahi se te contactara para hacer el seguimiento del evento.") }}
                    </p>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <br>

                <div class="container mx-auto mt-5">
                    <h2 class="font-bold text-center text-xl mb-10 text-gray-600">
                        Datos del evento
                    </h2>
                </div>

                <!-- Nombre del evento -->
                <div>
                    <x-input-label for="evento" :value="__('Nombre del evento')" />
                    <x-text-input id="evento" class="block mt-1 w-full" type="text" name="evento" :value="old('evento')" required/>
                    <x-input-error :messages="$errors->get('evento')" class="mt-2" />
                </div>

                <!-- Tipo de evento -->
                <div class="mt-4">
                    <x-input-label for="tipo" :value="__('Tipo de evento')" />
                    <x-text-input id="tipo" class="block mt-1 w-full" type="text" name="tipo" :value="old('tipo')" placeholder="ej. Convención, Deportivo, etc" required/>
                    <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
                </div>

                <!-- Departamento del evento -->
                <div class="mt-4">
                    <x-input-label for="departamento" :value="__('Departamento al que pertenece el evento')" />
                    <x-text-input id="departamento" class="block mt-1 w-full" type="text" name="departamento" :value="old('departamento')" placeholder="ej. Matemáticas, Tecnológicos, etc." required/>
                    <x-input-error :messages="$errors->get('departamento')" class="mt-2" />
                </div>

                <!-- Ubicacion del evento -->
                <div class="mt-4">
                    <x-input-label for="ubicacion" :value="__('Ubicación del evento')" />
                    <x-text-input id="ubicacion" class="block mt-1 w-full" type="text" name="ubicacion" :value="old('ubicacion')" required/>
                    <x-input-error :messages="$errors->get('ubicacion')" class="mt-2" />
                </div>

                <!-- Fecha del evento -->
                <div class="mt-6">
                    <x-input-label :value="__('Fecha del evento')" />

                    <x-input-label class="font-medium mt-2" for="fecha_inicio" :value="__('Inicio:')" />
                    <x-text-input id="fecha_inicio" class="block mt-1 w-full" type="datetime-local" name="fecha_inicio" :value="old('fecha_inicio')" required/>
                    <x-input-error :messages="$errors->get('fecha_inicio')" class="mt-2" />

                    <x-input-label class="font-medium mt-2" for="fecha_final" :value="__('Finalización:')" />
                    <x-text-input id="fecha_final" class="block mt-1 w-full" type="datetime-local" name="fecha_final" :value="old('fecha_final')" required/>
                    <x-input-error :messages="$errors->get('fecha_final')" class="mt-2" />
                </div>

                <!-- Material para el evento -->
                <div class="mt-8">
                    <x-input-label for="material" :value="__('Material que requiera para el evento')" />
                    <textarea name="material" id="material" rows="5" placeholder="Escriba aqui los materiales" class="block mt-1 w-full rounded"></textarea>
                    <x-input-error :messages="$errors->get('material')" class="mt-2" />
                </div>

                <x-primary-button class="w-full justify-center mt-10">
                    {{ __('Añadir participantes') }}
                </x-primary-button>
            </form>
        </div>
    </div>

@endsection