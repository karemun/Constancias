@extends('layouts.app')

@section('title')
    Registrar Evento
@endsection

@section('content')

<form method="POST" action="{{ route('evento.store') }}">
    @csrf

    <div class="mt-24 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-2 pb-10 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

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
                    Asegurate de escribir un correo electronico valido, ya que ahi se te contactara para hacer el seguimiento del evento.
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
        </div>
    </div>

    <!-- Con Ajax -->
    <div class="container">
        <div class="w-10/12 mx-auto mt-10 px-6 py-4 pb-10 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <h2 class="font-bold text-center text-xl mt-5 mb-10 text-gray-600">
                Datos del participante
            </h2>

            <div class="mt-1">
                <button type="button" class="add-select items-center mx-auto mb-5 px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                    Añadir Participante
                </button>
            </div>
        
            <table class="w-full text-sm text-left text-slate-500">
                <thead class="text-xs text-slate-700 uppercase bg-slate-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre completo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rol
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actividad
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Puesto
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Codigo (si aplica)
                        </th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
        
                <tbody>
                    <!-- Primer Participante -->
                    <tr class="bg-white border-b border-slate-200 clone-row">
                        <td class="px-6 py-4">
                            <input type="text" name="nombre_p[]" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" placeholder="Nombre del participante" required>
                        </td>
                        <td class="px-6 py-4">
                            <input type="text" name="rol_p[]" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" placeholder="Rol del participante" required>
                        </td>
                        <td class="px-6 py-4">
                            <input type="text" name="actividad_p[]" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" placeholder="Actividad que realizara" required>
                        </td>
                        <td class="px-6 py-4">
                            <input type="text" name="puesto_p[]" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" placeholder="Puesto del participante" required>
                        </td>
                        <td class="px-6 py-4">
                            <input type="text" name="codigo_p[]" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" placeholder="Codigo de UDG">
                        </td>
                        <td class="px-6 py-4">
                            <button type="button" class="btn-del-select add-btn inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-24 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-2 pb-10 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-primary-button class="w-full justify-center mt-10 bg-pink-800">
                {{ __('Solicitar Evento') }}
            </x-primary-button>
        </div>
    </div>

</form>

@endsection

@push('script')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        $('.btn-del-select').hide();
        $(document).on('click','.add-select', function(){
            $(this).parent().parent().find(".clone-row").clone().insertAfter($(this).parent()).removeClass("clone-row");
            $('.btn-del-select').fadeIn();
            $(this).parent().parent().find(".btn-del-select").click(function(e) {
                $(this).parent().parent().remove(); 
            });
        });
    </script>
@endpush
