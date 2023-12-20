@extends('layouts.app')
@section('content')
    <main class="flex flex-col gap-2">
        <h1
            class="mb-1 mt-2 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">
            STIKOM 22 Januari Learning Management System</h1>
        <div id="alert-border-4"
            class="flex items-center p-4 mb-4 text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50 dark:text-yellow-300 dark:bg-gray-800 dark:border-yellow-800"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="ml-3 text-sm font-medium">
                STIKOM 22 J-LMS Sedang dalam masa perbaikan.
            </div>
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
    </main>
    @if (session('status'))
        <div class="text-lg font-bold" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endsection
