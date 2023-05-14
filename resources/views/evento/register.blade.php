@extends('layouts.app')

@section('title')
    Registrar Evento
@endsection

@section('content')

<form method="POST" action="{{ route('evento.store') }}">
    @csrf

    <div class="mt-16 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-2 pb-10 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="container mx-auto mt-5">
                <h2 class="font-bold text-center text-xl mb-10 text-gray-600">
                    Datos del solicitante
                </h2>
            </div>

            <!-- Nombre solicitante -->
            <div>
                <x-input-label for="nombre" :value="__('Nombre*')" />
                <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required/>
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Correo electronico*')" />
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
                <x-input-label for="nombre_evento" :value="__('Nombre del evento*')" />
                <x-text-input id="nombre_evento" class="block mt-1 w-full" type="text" name="nombre_evento" :value="old('nombre_evento')" required/>
                <x-input-error :messages="$errors->get('nombre_evento')" class="mt-2" />
            </div>

            <!-- Tipo de evento -->
            <div class="mt-4">
                <x-input-label for="tipo" :value="__('Tipo de evento*')" />
                <x-text-input id="tipo" class="block mt-1 w-full" type="text" name="tipo" :value="old('tipo')" placeholder="ej. Convención, Deportivo, etc" required/>
                <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
            </div>

            <!-- Departamento del evento -->
            <div class="mt-4">
                <x-input-label for="departamento" :value="__('Departamento al que pertenece el evento*')" />
                <x-text-input id="departamento" class="block mt-1 w-full" type="text" name="departamento" :value="old('departamento')" placeholder="ej. Matemáticas, Tecnológicos, etc." required/>
                <x-input-error :messages="$errors->get('departamento')" class="mt-2" />
            </div>

            <!-- Ubicacion del evento -->
            <div class="mt-4">
                <x-input-label for="ubicacion" :value="__('Ubicación del evento*')" />
                <x-text-input id="ubicacion" class="block mt-1 w-full" type="text" name="ubicacion" :value="old('ubicacion')" required/>
                <x-input-error :messages="$errors->get('ubicacion')" class="mt-2" />
            </div>

            <!-- Fecha del evento -->
            <div class="mt-6">
                <x-input-label :value="__('Fecha del evento')" />

                <x-input-label class="font-medium mt-2" for="fecha_inicio" :value="__('Inicio*')" />
                <x-text-input id="fecha_inicio" class="block mt-1 w-full" type="datetime-local" name="fecha_inicio" :value="old('fecha_inicio')" required/>
                <x-input-error :messages="$errors->get('fecha_inicio')" class="mt-2" />

                <x-input-label class="font-medium mt-2" for="fecha_final" :value="__('Finalización*')" />
                <x-text-input id="fecha_final" class="block mt-1 w-full" type="datetime-local" name="fecha_final" :value="old('fecha_final')" required/>
                <x-input-error :messages="$errors->get('fecha_final')" class="mt-2" />
            </div>

            <!-- Material para el evento -->
            <div class="mt-8">
                <x-input-label for="material" :value="__('Material que requiera para el evento*')" />
                <textarea name="material" id="material" rows="5" placeholder="Escriba aqui los materiales" class="block mt-1 w-full rounded">{{ old('material') }}</textarea>
                <x-input-error :messages="$errors->get('material')" class="mt-2" />
            </div>
        </div>
    </div>

    <!-- Participantes -->
    <div class="container">
        <div class="w-10/12 mx-auto mt-10 px-6 py-4 pb-10 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <h2 class="font-bold text-center text-xl mt-5 mb-10 text-gray-600">
                Datos de participantes
            </h2>

            <div class="mt-5 flex justify-center">
                <button type="button" class="clone-btn items-center mx-auto mb-12 mt-5 px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                    Añadir Participante
                </button>
            </div>

            @if (session('mensaje'))
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    {{ session('mensaje') }}
                </p>
            @endif
            
            <div class="w-full text-sm text-left text-slate-500 clone-row">
                <!-- Labels -->
                <div class="text-xs text-slate-700 uppercase font-semibold bg-slate-50 grid grid-cols-6 gap-4 px-6 py-3">
                    <span>Nombre completo*</span>
                    <span>Rol*</span>
                    <span>Actividad*</span>
                    <span>Puesto*</span>
                    <span>Código UDG (si aplica)</span>
                    <span></span>
                </div>
            
                <!-- Inputs -->
                <div class="bg-white border-b border-slate-200">
                    <div class="px-6 py-4 grid grid-cols-6 gap-4">
                        <div>
                            <input type="text" name="nombre_p[]" id="nombre_p[]" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" required>
                        </div>
                        <div>
                            <input type="text" name="rol_p[]" id="rol_p[]" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" required>
                        </div>
                        <div>
                            <input type="text" name="actividad_p[]" id="actividad_p[]" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" required>
                        </div>
                        <div>
                            <input type="text" name="puesto_p[]" id="puesto_p[]" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" required>
                        </div>
                        <div>
                            <input type="text" name="codigo_p[]" id="codigo_p[]" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full"/>
                        </div>
                        <div>
                            <button type="button" class="btn-del inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700">
                                Eliminar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="mt-4 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-md mt-2 pb-10 px-6 py-4">
            <x-primary-button class="w-full justify-center mt-10 bg-pink-800 hover:bg-pink-900">
                {{ __('Solicitar Evento') }}
            </x-primary-button>
        </div>
    </div>

</form>

@endsection

@push('script')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        $(".clone-row:first .btn-del").hide();

        $(".clone-btn").on("click", function() {
            var clone = $(".clone-row").last().clone();
            clone.find("input").val("");
            clone.find(".btn-del").show();
            clone.insertAfter(".clone-row:last");
        });

        $(document).on("click", ".btn-del", function() {
            $(this).closest(".clone-row").remove();
        });
    </script>
@endpush
