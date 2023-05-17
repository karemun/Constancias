@extends('layouts.app')

@section('title')
    Solicitar Constancias
@endsection

@push('styles')
    <!-- Dropzone diseño al subir imagen -->
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')

    <div class="mt-16 md:flex md:justify-center md:gap-10 md:items-center">

        <!-- Formulario para subir archivos -->
        <div class="md:w-1/2 px-10">
            <label class="mb-2 block text-gray-500 font-bold">Añadir archivos de evidencia (videos, imagenes, documentos, presentaciones)*</label>

            <form action="{{ route('evidencia.archivos.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 max-h-96 overflow-y-auto rounded flex justify-center items-center">
                @csrf
            </form>
        </div>

        <!-- Formulario inputs -->
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form method="POST" action="{{ route('evidencia.store', ['folio' => $folio]) }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Documento de autorizacion -->
                    <div class="mb-5">
                        <label class="mb-2 block text-gray-500 font-bold">Documento de autorización (PDF)*</label>
                        <input type="file" name="pdf" id='pdf' accept="application/pdf" :value="old('pdf')" required>
                        <x-input-error :messages="$errors->get('pdf')" class="mt-2" />
                    </div>

                    <!-- Material para el evento -->
                    <div class="mb-5">
                        <label class="mb-2 block text-gray-500 font-bold">Publicaciones del evento (links/enlaces)</label>
                        <textarea name="links" id="links" rows="6" placeholder="Escriba aqui los links/enlaces generados sobre el evento" class="block mt-1 w-11/12 rounded"></textarea>
                        <x-input-error :messages="$errors->get('links')" class="mt-2" />
                    </div>

                    
                    {{-- Archivos --}}
                    <div id="archivos"></div>

                    <p class="mt-1 text-sm text-gray-600">
                        Nota: Al enviar los datos, deberas esperar a que los directivos validen la evidencia enviada (recibiras un correo con la respuesta) y se generen las constancias.
                    </p>

                    <input type="submit" value="Enviar Datos" class="bg-gray-800 hover:bg-gray-700 transition-colors cursor-pointer mt-4 px-4 py-2 font-semibold text-xs uppercase tracking-widest w-full p-3 text-white rounded-md"/>
            </form>
        </div>
    </div>

@endsection
