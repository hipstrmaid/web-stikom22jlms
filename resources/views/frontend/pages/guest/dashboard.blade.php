@extends('layouts.app')
@section('content')
    <x-content-title>Selamat Datang!</x-content-title>
    <x-breadcrumbs></x-breadcrumbs>
    @isset($matkuls)
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
                                        {{-- <div
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
                                                        <a href="{{ route('enroll.previewMatkul', ['id' => $matkul->id]) }}"
                                                            class="w-full inline-flex justify-center rounded px-3 py-2 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                            Detail
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div
                                            class="bg-white border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700 rounded-lg overflow-hidden">
                                            <img class="w-full h-48 object-cover border border-b dark:border-gray-800"
                                                src="{{ Storage::url($matkul->gambar) }}" alt="Course Image">
                                            <div class="flex flex-col flex-grow">
                                                <div class="content px-4 py-2 flex flex-col gap-1">
                                                    <div class="card-title">
                                                        <p class="text-lg font-semibold text-gray-800 dark:text-white">
                                                            {{ $matkul->nama_matkul }}</p>
                                                    </div>
                                                    <div class="card-description">
                                                        <p class="text-sm text-justify text-gray-600 dark:text-gray-400">
                                                            {{ $matkul->excerpt() }}</p>
                                                    </div>
                                                </div>

                                                <div class="card-footer border-t dark:border-gray-700">
                                                    <div class="flex py-2 px-4">
                                                        <div class="flex-shrink-0">
                                                            <img class="h-10 w-10 rounded-full object-cover"
                                                                src="{{ Storage::url($matkul->dosen->foto) }}"
                                                                alt="Instructor Avatar">
                                                        </div>
                                                        <div class="ml-3">
                                                            <p class="text-sm font-medium text-gray-900 dark:text-white">
                                                                {{ $matkul->dosen->nama }}
                                                            </p>
                                                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                                                {{ $matkul->dosen->user->role->nama_role }}
                                                            </p>
                                                        </div>
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
    @endisset
@endsection
