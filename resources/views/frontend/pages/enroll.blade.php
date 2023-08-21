@extends('layouts.app')
@section('content')
    <div class="content-head flex justify-between">
        <h1
            class="mb-1 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">
            Daftar Mata Kuliah</h1>
    </div>
    {{ Breadcrumbs::render('enrollMatkul') }}

    @if ($matkulExist)
        @include('includes.card._guestcourse')
    @else
        <p class="text-dark dark:text-white my-4 font-bold">Belum ada mata.</p>
    @endif
@endsection
