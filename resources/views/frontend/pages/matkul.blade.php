@extends('layouts.app')
@section('content')
    @auth
        <div class="content-head flex justify-between items-center">
            <x-content-title>Mata Kuliah</x-content-title>
            @if (auth()->user()->role->nama_role == 'Dosen')
                <a href="{{ route('matkul.create') }}">
                    <button type="button"
                        class="py-2.5 px-5 mr-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        <i class="fa-solid fa-plus"></i> Tambah
                    </button>
                </a>
            @endif
        </div>
        {{ Breadcrumbs::render('matkul') }}

        <div class="row">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4 h-46">
                @foreach ($matkuls as $matkul)
                    @include('includes.card._course')
                @endforeach
            </div>

        </div>
    @endauth
@endsection
