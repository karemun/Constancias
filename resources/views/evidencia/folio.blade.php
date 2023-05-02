@extends('layouts.app')

@section('title')
    Generar Constancias
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl mx-auto">
                    <h2 class="text-lg font-medium text-gray-900">
                        Número de folio
                    </h2>
            
                    <p class="mt-1 text-sm text-gray-600">
                        Ingrese el numero de folio del evento para poder acceder a la generación de constancias.
                    </p>

                    <form method="POST" action="{{ route('evidencia.verify') }}" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="folio" :value="__('Folio')" />
                            <x-text-input id="folio" name="folio" type="text" class="mt-1 block w-full" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('folio')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Ingresar folio') }}</x-primary-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection