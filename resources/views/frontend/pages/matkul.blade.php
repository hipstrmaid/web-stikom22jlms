@extends('layouts.app')
@section('content')
    @auth
        <div class="content-head flex justify-between items-center">
            <x-content-title>Mata Kuliah</x-content-title>
            @if (auth()->user()->dosen && auth()->user()->status == 'Aktif')
                <a href="{{ route('matkul.create') }}">
                    <button type="button"
                        class="py-2 px-2 mr-2 text-sm font-medium text-gray-900 focus:outline-none bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        <i class="fa-solid fa-plus"></i> Tambah
                    </button>
                </a>
            @elseif (auth()->user()->mahasiswa && auth()->user()->status == 'Aktif')
                <a href="{{ route('enroll.index') }}">
                    <button type="button"
                        class="py-1 px-2 mr-2 text-sm font-medium text-gray-900 focus:outline-none bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        <i class="fa-solid fa-plus"></i> Enroll
                    </button>
                </a>
            @endif
        </div>
        {{ Breadcrumbs::render('matkul') }}

        <div class="row">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 mb-4 h-46">
                @foreach ($matkuls as $matkul)
                    @if (Auth::user()->dosen)
                        @include('includes.card._course')
                    @else
                        @include('includes.card._mhscourse')
                    @endif
                @endforeach
            </div>

        </div>
    @endauth
@endsection
