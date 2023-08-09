@extends('layouts.app')
@section('content')
    <div class="calendar flex flex-col gap-5">
        <h1
            class="mb-1 mt-2 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">
            Calendar</h1>
        <div id='calendar' class="bg-gray-50 text-black dark:text-white p-5 shadow-lg dark:bg-gray-800"></div>
    </div>

    <script src="{{ asset('js/calendar.js') }}"></script>
    <script src="{{ asset('js/index.global.min.js') }}"></script>
@endsection
