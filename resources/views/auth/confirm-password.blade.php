@extends('layouts.app')

@section('title')
    Confirmar Contraseña
@endsection

@section('content')

    <div class="mt-24 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Confirma tu contraeña para continuar.') }}
            </div>
        
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
        
                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Contraseña')" />
        
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
        
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <div class="flex justify-end mt-4">
                    <x-primary-button>
                        {{ __('Confirmar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

@endsection