@extends('layouts.app')
@section('content')
    <x-content-title>Dashboard</x-content-title>
    <x-breadcrumbs></x-breadcrumbs>

    <div class="list-matkul">
        <div id="accordion-collapse" class="flex flex-col gap-3" data-accordion="collapse">
            @foreach ($matkuls as $semesterId => $semesterMatkuls)
                @foreach ($semesterMatkuls as $matkul)
                    <h2 id="accordion-collapse-heading-{{ $semesterId }}">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                            data-accordion-target="#accordion-collapse-body-{{ $semesterId }}"
                            aria-controls="accordion-collapse-body-{{ $semesterId }}">
                            <span>Mata Kuliah: Semester {{ $semesterId }}</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-{{ $semesterId }}" class="hidden"
                        aria-labelledby="accordion-collapse-heading-{{ $semesterId }}">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <div class="row">
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 h-46 mb-4">
                                    <div
                                        class="max-w-lg bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                        <a href="#">
                                            <img class="rounded-t-lg border-b border-gray-200"
                                                src="{{ Storage::url($matkul->gambar) }}" alt="thumbnail" />
                                        </a>
                                        <div class="p-5">
                                            <span
                                                class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $matkul->hari }}</span>
                                            <a href="#">
                                                <h5
                                                    class="my-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                    {{ $matkul->nama_matkul }}</h5>
                                            </a>
                                            <p class="mb-3 font-xs text-gray-700 dark:text-gray-400">
                                                {{ $matkul->excerpt() }}
                                            </p>

                                            <div class="w-full bg-gray-200 rounded-full h-2.5 mb-2.5 dark:bg-gray-700">
                                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
                                            </div>
                                            <div class="panel-footer">
                                                @if (Auth::check() && $matkul->user_id == Auth::user()->id)
                                                    <button
                                                        class="w-full px-3 py-2 text-sm font-medium text-white bg-green-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-green-800 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                        <a href="/matkul/pertemuan" class="inline-flex  items-center"><i
                                                                class="fa-solid fa-pen-to-square mr-2"></i> Edit Mata Kuliah
                                                        </a>
                                                    </button>
                                                @endif

                                                <button
                                                    class="w-full px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <a href="/matkul/pertemuan/belajar" class=" inline-flex items-center">
                                                        Belajar
                                                    </a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
