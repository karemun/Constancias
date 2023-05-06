@extends('layouts.app')

@section('title')
    Registrar Evento
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <p class="text-sm font-medium text-gray-500">
                        Se enviaron los datos del evento correctamente. Se te enviara un correo al email proporcionado en el registro de evento cuando los datos hayan sido aprobados.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection