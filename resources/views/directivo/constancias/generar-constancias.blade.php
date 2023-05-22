@extends('layouts.app')

@section('title')
Generar Constancias
@endsection

@section('content')

<div class="py-6">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <h2 class="font-bold text-center text-xl mt-5 mb-5 text-gray-600">
            Datos del Evento
        </h2>
        <table class="min-w-full text-center text-sm font-light">
            <thead class="border-b bg-red-900 font-medium text-white dark:border-neutral-500">
                <tr>
                    <th scope="col" class=" px-6 py-4">Nombre</th>
                    <th scope="col" class=" px-6 py-4">Tipo</th>
                    <th scope="col" class=" px-6 py-4">Departamento</th>
                </tr>
            </thead>
            <tbody class="bg-slate-200">
                <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap  px-6 py-4 font-medium">{{ $evento->nombre }}</td>
                    <td class="whitespace-nowrap  px-6 py-4">{{ $evento->tipo }}</td>
                    <td class="whitespace-nowrap  px-6 py-4">{{ $evento->departamento }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="py-6">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <h2 class="font-bold text-center text-xl mt-2 mb-5 text-gray-600">
            Solicitante
        </h2>
        <table class="min-w-full text-center text-sm font-light">
            <thead class="border-b bg-red-900 font-medium text-white dark:border-neutral-500">
                <tr>
                    <th scope="col" class=" px-6 py-4">Nombre</th>
                    <th scope="col" class=" px-6 py-4">Correo</th>
                    <th scope="col" class=" px-6 py-4">Codigo</th>
                </tr>
            </thead>
            <tbody class="bg-slate-200">
                <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap  px-6 py-4 font-medium">{{ $evento->solicitante->nombre }}</td>
                    <td class="whitespace-nowrap  px-6 py-4">{{ $evento->solicitante->email }}</td>
                    <td class="whitespace-nowrap  px-6 py-4">{{ $evento->solicitante->codigo }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<form action="{{ route('directivo.constancias.store', ['evento' => $evento]) }}" method="POST">
    @csrf

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <h2 class="font-bold text-center text-xl mt-2 mb-5 text-gray-600">
                Participantes
            </h2>
            <div class="overflow-x-auto">
                <table class="min-w-full text-center text-sm font-light">
                    <thead class="border-b bg-red-900 font-medium text-white dark:border-neutral-500">
                        <tr>
                            <th scope="col" class=" px-6 py-4">Nombre</th>
                            <th scope="col" class=" px-6 py-4">Rol</th>
                            <th scope="col" class=" px-6 py-4">Actividad</th>
                            <th scope="col" class=" px-6 py-4">Puesto</th>
                            <th scope="col" class=" px-6 py-4">Codigo</th>
                            <th scope="col" class=" px-6 py-4">Tipo de Certificado</th>
                        </tr>
                    </thead>
                    <tbody class="bg-slate-200">
                        @foreach ($evento->participante as $participante)
                            <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $participante->nombre }}</td>
                                <td class="whitespace-pre-wrap px-6 py-4">{{ $participante->rol }}</td>
                                <td class="whitespace-pre-wrap px-6 py-4">{{ $participante->actividad }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $participante->puesto }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $participante->codigo }}</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <select name="certificado" id="certificado" class="bg-indigo-200 hover:bg-indigo-100 font-medium">
                                        <option value="reconocimiento">Reconocimiento</option>
                                        <option value="diploma">Diploma</option>
                                        <option value="constancia">Constancia</option>
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="mt-4 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-md mt-2 pb-10 px-6 py-4">
            <button class="w-full justify-center mt-10 inline-flex items-center px-4 py-2 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Firmar Constancias
            </button>
        </div>
    </div>
</form>

@endsection
