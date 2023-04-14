@extends('layouts.app')

@section('title')
    Verficar email
@endsection

@section('content')

    <div class="mt-24 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-2 px-6 py-10 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Es necesario confirmar tu cuenta antes de continuar, revisa tu email y presiona sobre el enlace de confirmación.') }}
            </div>
        
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('Hemos enviado un nuevo email de confirmación a la cuenta que colocaste en el registro.') }}
                </div>
            @endif
        
            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
        
                    <div>
                        <x-primary-button>
                            {{ __('Reenviar email de confirmación') }}
                        </x-primary-button>
                    </div>
                </form>
        
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
        
                    <button type="submit" class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Cerrar Sesión') }}
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
