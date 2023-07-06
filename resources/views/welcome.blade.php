@extends('layouts.app')
@section('content')
    <main class="flex flex-col gap-2">
        <h1
            class="mb-1 mt-2 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">
            Selamat Datang, Civitas Akademik</h1>
        <div id="alert-border-4"
            class="flex items-center p-4 mb-4 text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50 dark:text-yellow-300 dark:bg-gray-800 dark:border-yellow-800"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="ml-3 text-sm font-medium">
                STIKOM 22 J-LMS Sedang dalam perbaikan.
            </div>
        </div>
    </main>
    @if (session('status'))
        <div class="text-lg font-bold" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endsection
