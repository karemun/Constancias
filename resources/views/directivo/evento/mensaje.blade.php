@extends('layouts.app')

@section('title')
    Autorizar Evento
@endsection

@section('content')
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <p class="text-md font-medium text-gray-500">
                        {{ $mensaje }}
                    </p>
                </div>
            </div>
        </div>
@endsection