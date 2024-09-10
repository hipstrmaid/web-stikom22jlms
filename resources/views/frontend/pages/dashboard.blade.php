@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="nav">
        <x-content-title>Selamat datang, {{ Auth::user()->role->nama_role }}.</x-content-title>
        <x-breadcrumbs></x-breadcrumbs>
    </div>
    <div class="list-matkul">
        <div id="accordion-collapse" class="flex flex-col gap-2" data-accordion="collapse">
            @foreach ($matkuls as $semesterId => $matkulGroup)
                <h2 id="accordion-collapse-heading-{{ $semesterId }}">
                    <button type="button"
                        class="flex items-center justify-between w-full bg-white dark:bg-gray-900 p-3 font-medium text-left text-gray-900 border border-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                        data-accordion-target="#accordion-collapse-body-{{ $semesterId }}"
                        aria-controls="accordion-collapse-body-{{ $semesterId }}">
                        <span class="text-sm"><i class="fas fa-folder mr-2"></i>Semester {{ $semesterId }}</span>
                        <x-arrow-down></x-arrow-down>
                    </button>
                </h2>
                <div id="accordion-collapse-body-{{ $semesterId }}" class="hidden"
                    aria-labelledby="accordion-collapse-heading-{{ $semesterId }}">
                    <div class="dark:bg-gray-900">
                        <div class="row">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-2">
                                @foreach ($matkulGroup as $matkul)
                                    <div
                                        class="bg-white border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700 rounded-lg overflow-hidden">
                                        <img class="w-full h-48 object-cover border border-b dark:border-gray-800"
                                            src="{{ Storage::url($matkul->gambar) }}" alt="Course Image">
                                        <div class="p-4">
                                            <h2 class="text-md font-semibold text-gray-800 dark:text-white mb-2">
                                                {{ $matkul->nama_matkul }}</h2>
                                            <p class="text-sm leading-normal text-gray-600 dark:text-gray-400 mb-4">
                                                {{ $matkul->excerpt() }}</p>
                                            <div class="">
                                                <div>
                                                    <a href="{{ route('matkul.pertemuanPreview', ['id' => $matkul]) }}"
                                                        class="w-full inline-flex justify-center rounded px-3 py-2 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        Belajar
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
