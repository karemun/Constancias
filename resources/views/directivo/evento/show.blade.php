@extends('layouts.app')

@section('title')
    Evento: {{ $evento->evento }}
@endsection

@section('content')

    <div class="mt-24 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-2 pb-10 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <div class="container mx-auto mt-5">
                <h2 class="font-bold text-center text-xl mb-10 text-gray-600">
                    Datos del solicitante
                </h2>
            </div>

            <!-- Nombre solicitante -->
            <div>
                <x-input-label :value="__('Nombre')" />
                <x-text-input class="block mt-1 w-full" type="text" value="{{ $evento->solicitante->nombre }}" readonly/>
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-input-label :value="__('Correo electronico')" />
                <x-text-input class="block mt-1 w-full" type="text" value="{{ $evento->solicitante->email }}" readonly/>
            </div>

            <br>

            <div class="container mx-auto mt-5">
                <h2 class="font-bold text-center text-xl mb-10 text-gray-600">
                    Datos del evento
                </h2>
            </div>

            <!-- Nombre del evento -->
            <div>
                <x-input-label :value="__('Nombre del evento')" />
                <x-text-input class="block mt-1 w-full" type="text" value="{{ $evento->evento }}" readonly/>
            </div>

            <!-- Tipo de evento -->
            <div class="mt-4">
                <x-input-label :value="__('Tipo de evento')" />
                <x-text-input class="block mt-1 w-full" type="text" value="{{ $evento->tipo }}" readonly/>
            </div>

            <!-- Departamento del evento -->
            <div class="mt-4">
                <x-input-label :value="__('Departamento al que pertenece el evento')" />
                <x-text-input class="block mt-1 w-full" type="text" value="{{ $evento->departamento }}" readonly/>
            </div>

            <!-- Ubicacion del evento -->
            <div class="mt-4">
                <x-input-label :value="__('Ubicación del evento')" />
                <x-text-input class="block mt-1 w-full" type="text" value="{{ $evento->ubicacion }}" readonly/>
            </div>

            <!-- Fecha del evento -->
            <div class="mt-6">
                <x-input-label :value="__('Fecha del evento')" />

                <x-input-label class="font-medium mt-2" for="fecha_inicio" :value="__('Inicio:')" />
                <x-text-input class="block mt-1 w-full" type="text" value="{{ $evento->fecha_inicio }}" readonly/>

                <x-input-label class="font-medium mt-2" for="fecha_final" :value="__('Finalización:')" />
                <x-text-input class="block mt-1 w-full" type="text" value="{{ $evento->fecha_final }}" readonly/>
            </div>

            <!-- Material para el evento -->
            <div class="mt-8">
                <x-input-label :value="__('Material que requiera para el evento')" />
                <textarea rows="5" class="block mt-1 w-full rounded" readonly>{{ $evento->material }}</textarea>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="w-10/12 mx-auto mt-10 px-6 py-4 pb-10 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <h2 class="font-bold text-center text-xl mt-5 mb-10 text-gray-600">
                Datos de los participantes
            </h2>
        
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
                    @foreach ($evento->participante as $participante)
                        <tr class="bg-white border-b border-slate-200 clone-row">
                            <td class="px-6 py-4">
                                <input type="text" value="{{ $participante->nombre }}" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" readonly>
                            </td>
                            <td class="px-6 py-4">
                                <input type="text" value="{{ $participante->rol }}" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" readonly>
                            </td>
                            <td class="px-6 py-4">
                                <input type="text" value="{{ $participante->actividad }}" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" readonly>
                            </td>
                            <td class="px-6 py-4">
                                <input type="text" value="{{ $participante->puesto }}" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" readonly>
                            </td>
                            <td class="px-6 py-4">
                                <input type="text" value="{{ isset($participante->codigo)?$participante->codigo:"" }}" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" readonly>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Divider -->
    <div class="my-4 mt-20 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300"></div>

    <form method="POST" action="{{ route('directivo.evento.autorizar', ['evento' => $evento]) }}">
        @csrf
        <div class="mt-20 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="w-full sm:max-w-md mt-2 pb-10 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                    <div class="container mx-auto mt-5">
                        <h2 class="font-bold text-center text-xl mb-10 text-gray-600">
                            Autorizar o Rechazar Evento
                        </h2>
                    </div>
        
                    <div class="mt-5">
                        <x-input-label for="observacion" :value="__('Agregar observaciones (opcional):')" />
                        <textarea name="observacion" id="observacion" rows="5" placeholder="Escriba aqui las observaciones" class="block mt-1 w-full rounded"></textarea>
                    </div>

                    <x-primary-button class="w-full justify-center mt-10 bg-emerald-600 hover:bg-emerald-500" name="accion" value="autorizar" onclick="return confirm('¿Estas seguro de que quieres autorizar el evento?')">
                        {{ __('Autorizar Evento') }}
                    </x-primary-button>

                    <x-primary-button class="w-full justify-center mt-10 bg-red-600 hover:bg-red-500" name="accion" value="rechazar" onclick="return confirm('¿Estas seguro de que quieres rechazar el evento?')">
                        {{ __('Rechazar Evento') }}
                    </x-primary-button>
            </div>
        </div>
    </form>

@endsection