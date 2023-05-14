@extends('layouts.app')

@section('title')
Calendario de Eventos
@endsection

@section('content')

<div class="container">
    <div class="mt-16 px-6 py-4 bg-white shadow-md rounded-lg">
        <div id="calendar"></div>
    </div>
</div>

@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',    //Calendario dia/semana/mes
                    slotMinTime: '8:00:00',         //Fecha inicial del calendario
                    slotMaxTime: '21:00:00',        //Fecha final
                    headerToolbar: {                //Organizacion del header
                        left: 'prev,next',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    locale: 'es',                   //Idioma del calendario
                    events: @json($events),
                });
                calendar.render();
            });
</script>
@endpush
