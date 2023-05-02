@extends('layouts.app')

@section('title')
Eventos Pendientes
@endsection

@section('content')
    @if(session('mensaje'))
        <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-emerald-400">
            <span class="inline-block align-middle mr-8">
                {{ session('mensaje') }}
            </span>
            <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
                <span>×</span>
            </button>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <table class="min-w-full text-center text-sm font-light">
                <thead class="border-b bg-udg font-medium text-white dark:border-neutral-500">
                    <tr>
                        <th scope="col" class=" px-6 py-4">Folio</th>
                        <th scope="col" class=" px-6 py-4">Evento</th>
                        <th scope="col" class=" px-6 py-4">Fecha solicitada</th>
                        <th scope="col" class=" px-6 py-4">Acción</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-200">
                    @foreach ($eventos as $evento)
                        <tr class="border-b dark:border-neutral-500">
                            <td class="whitespace-nowrap  px-6 py-4">#{{ $evento->folio }}</td>
                            <td class="whitespace-nowrap  px-6 py-4 font-medium">{{ $evento->nombre }}</td>
                            <td class="whitespace-nowrap  px-6 py-4">{{ date('d/m/Y', strtotime($evento->created_at)) }}</td>
                            <td>
                                <a href="{{ route('directivo.evento.show', ['evento' => $evento]) }}" 
                                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700">
                                    Ver
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="my-10">
                <!-- Paginacion -->
                {{ $eventos->links('pagination::tailwind') }}
            </div>

        </div>
    </div>
@endsection

@push('script')
    <script>
        function closeAlert(event){
            let element = event.target;
            while(element.nodeName !== "BUTTON"){
                element = element.parentNode;
            }
            element.parentNode.parentNode.removeChild(element.parentNode);
        }
    </script>
@endpush