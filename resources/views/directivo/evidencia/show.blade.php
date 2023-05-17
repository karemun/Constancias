@extends('layouts.app')

@section('title')
Evidencia: {{ $evento->nombre }}
@endsection

@section('content')

    <div class="container mx-auto mt-10 px-6 py-4 pb-10 bg-white shadow-md sm:rounded-lg">
        <!-- Documento de autorización -->
        <h2 class="text-xl text-center font-medium text-gray-900 mb-6 mt-4">
            Documento de autorización
        </h2>
        <div class="flex justify-center items-center">
            @foreach ($evento->evidencia as $evidencia)
                <iframe src="{{ asset('storage/documentos') . '/' . $evidencia->documento }}" width="50%" height="600px"
                class="mb-4"></iframe>
            @endforeach
        </div>

        <!-- Imagenes -->
        <h2 class="text-xl text-center font-medium text-gray-900 mb-6 mt-8">
            Imágenes
        </h2>
        <div class="grid md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-6 px-4">
            @php
                $imagenes = false;
            @endphp
            @foreach ($evento->evidencia as $evidencia)
                @foreach ($evidencia->archivo as $archivo)
                    @if ($archivo->tipo === 'imagen')
                        @php
                            $imagenes = true;
                        @endphp
                        <div>
                            <img src="{{ asset('storage/archivos') . '/' . $archivo->archivo }}" alt="Archivo del evento"
                                class="w-full h-auto">
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
        <div>
            @if (!$imagenes)
                <div class="flex justify-center items-center">
                    <p class="font-medium text-center">No se enviaron imágenes.</p>
                </div>
            @endif
        </div>

        <!-- Videos -->
        <h2 class="text-xl text-center font-medium text-gray-900 mb-6 mt-12">
            Videos
        </h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 px-4">
            @php
                $videos = false;
            @endphp
            @foreach ($evento->evidencia as $evidencia)
                @foreach ($evidencia->archivo as $archivo)
                    @if ($archivo->tipo === 'video')
                        @php
                            $videos = true;
                        @endphp
                        <div>
                            <video controls class="w-full h-auto">
                                <source src="{{ asset('storage/archivos') . '/' . $archivo->archivo }}" type="video/mp4">
                                <source src="{{ asset('storage/archivos') . '/' . $archivo->archivo }}" type="video/avi">
                                <source src="{{ asset('storage/archivos') . '/' . $archivo->archivo }}" type="video/mov">
                                <source src="{{ asset('storage/archivos') . '/' . $archivo->archivo }}" type="video/wmv">
                                Tu navegador no admite el tipo de video.
                            </video>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
        <div>
            @if (!$videos)
                <div class="flex justify-center items-center">
                    <p class="font-medium text-center">No se enviaron videos.</p>
                </div>
            @endif
        </div>

        <!-- Documentos -->
        <h2 class="text-xl text-center font-medium text-gray-900 mb-4 mt-8">
            Documentos
        </h2>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full border text-center text-sm font-light dark:border-neutral-500 rounded">
                            <thead class="border-b font-medium dark:border-neutral-500 bg-gray-600">
                                <tr class="text-white">
                                    <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                        #
                                    </th>
                                    <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                        Documento
                                    </th>
                                    <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                        Acción
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-slate-100">
                                @php
                                    $contador = 1;
                                    $doc = false;
                                @endphp
                                @foreach ($evento->evidencia as $evidencia)
                                    @foreach ($evidencia->archivo as $archivo)
                                        @if ($archivo->tipo === 'documento')
                                            <tr class="border-b dark:border-neutral-500">
                                                <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">{{ $contador }}</td>
                                                <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">{{ $archivo->archivo }}</td>
                                                <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                                    <button class="ver-archivo inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-indigo-500" data-url="{{ asset('storage/archivos/' . $archivo->archivo) }}">Abrir</button>
                                                </td>
                                            </tr>
                                            @php
                                                $doc = true;
                                                $contador++;
                                            @endphp
                                        @endif
                                    @endforeach
                                @endforeach
                                @if (!$doc)
                                    <tr class="border-b dark:border-neutral-500">
                                        <td colspan="3" class="px-6 py-4 font-medium">No se enviaron documentos</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enlaces -->
        <h2 class="text-xl text-center font-medium text-gray-900 mb-4 mt-8">
            Enlaces
        </h2>
        <div class="flex justify-center items-center">
            @foreach ($evento->evidencia as $evidencia)
                @if (!empty($evidencia->enlace))
                    <textarea rows="5" class="block mt-1 w-1/2 rounded" readonly>{{ $evidencia->enlace }}</textarea>
                @else
                    <textarea rows="5" class="block mt-1 w-1/2 rounded text-center" readonly>No se enviaron enlaces.</textarea>
                @endif
            @endforeach
        </div>
    </div>

    <!-- Autorizar Evidencia -->
    <div
        class="my-4 mt-20 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300">
    </div>

    <form method="POST" action="{{ route('directivo.evidencia.autorizar', ['evento' => $evento]) }}">
        @csrf
        <div class="mt-20 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="w-full sm:max-w-md mt-2 pb-10 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div class="container mx-auto mt-5">
                    <h2 class="font-bold text-center text-xl mb-10 text-gray-600">
                        Autorizar o Rechazar Evidencia
                    </h2>
                </div>

                <div class="mt-5">
                    <x-input-label for="observacion" :value="__('Agregar observaciones (opcional):')" />
                    <textarea name="observacion" id="observacion" rows="5" placeholder="Escribe aqui las observaciones." class="block mt-1 w-full rounded"></textarea>
                </div>

                <button name="accion" value="autorizar"
                    class="w-full justify-center mt-10 inline-flex items-center px-4 py-2 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Generar Constancias
                </button>

                <button name="accion" value="rechazar"
                    class="w-full justify-center mt-10 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    onclick="return confirm('¿Estas seguro de que quieres rechazar la evidencia?')">
                    Rechazar Evidencia
                </button>
            </div>
        </div>
    </form>

@endsection

@push('script')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.ver-archivo').on('click', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                window.open(url, '_blank');
            });
            });
    </script>
@endpush