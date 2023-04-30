@extends('layouts.app')

@section('title')
    Generador de Constancias
@endsection

@section('content')
    <div class="mb-3 xl:w-96 py-12 container mx-auto mt-24">
        
        <!--Search Button-->
        <div class="relative mb-4 flex w-full flex-wrap items-stretch">
            <input
            type="search"
            class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:br-priordemary focus:text-neutral-700 focus:outline-none dark:text-neutral-200 dark:placeholder:text-neutral-400 dark:focus:border-primary bg-gray-200"
            placeholder="Buscar constancias"
            aria-label="Search"
            aria-describedby="button-addon1" />

            <button
            class="relative z-[2] flex items-center rounded-r bg-gray-800 px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white transition hover:bg-gray-700 hover:shadow-lg"
            type="button"
            id="button-addon1"
            data-te-ripple-init
            data-te-ripple-color="light">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd"/>
                </svg>
            </button>
        </div>

        <div class="w-full text-center block">
            <a href="{{ route('directivo.evento.index') }}" class="flex items-center justify-center leading-normal bg-gray-800 hover:bg-gray-700 transition-colors cursor-pointer font-bold p-3 mt-20 text-white rounded-lg">
                Eventos Pendientes
            </a>
        </div>

        <button onclick="" class="bg-gray-800 hover:bg-gray-700 transition-colors cursor-pointer font-bold w-full p-3 mt-10 text-white rounded-lg"> 
            Certificados Pendientes
        </button>

        <div class="w-full text-center block">
            <a href="{{ route('directivo.cuenta.index') }}" class="flex items-center justify-center leading-normal bg-gray-800 hover:bg-gray-700 transition-colors cursor-pointer font-bold p-3 mt-10 text-white rounded-lg">
                Cuentas Registradas
            </a>
        </div>

    </div>
@endsection
