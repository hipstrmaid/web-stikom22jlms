@extends('layouts.app')
@section('content')
    <div class="content-head flex justify-between">
        <h1
            class="mb-1 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">
            Daftar Mata Kuliah</h1>
    </div>
    {{ Breadcrumbs::render('enrollMatkul') }}

    @include('includes.card._guestcourse')
    {{-- <div class="bg-white text-sm border border-gray-200 border-t-0 dark:border-gray-900 dark:bg-gray-800">
        <ul class="grid gap-2 mb-4 p-5">
            <li>

            </li>

        </ul>
    </div> --}}
@endsection
