@extends('layouts.app')
@section('content')
    <div class="nav">
        <x-content-title>Selamat datang, {{ Auth::user()->role->nama_role }}.</x-content-title>
        <x-breadcrumbs></x-breadcrumbs>
    </div>
    {{-- <div class="list-matkul">
        <div id="accordion-collapse" class="flex flex-col gap-2" data-accordion="collapse">
            @foreach ($matkuls as $semesterId => $matkulGroup)
                <h2 id="accordion-collapse-heading-{{ $semesterId }}">
                    <button type="button"
                        class="flex items-center justify-between w-full bg-white dark:bg-gray-900 p-3 rounded rounded-lg font-medium text-left text-gray-900 border border-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                        data-accordion-target="#accordion-collapse-body-{{ $semesterId }}"
                        aria-controls="accordion-collapse-body-{{ $semesterId }}">
                        <span><i class="fas fa-folder mr-2"></i>Semester {{ $semesterId }}</span>
                        <x-arrow-down></x-arrow-down>
                    </button>
                </h2>
                <div id="accordion-collapse-body-{{ $semesterId }}" class="hidden"
                    aria-labelledby="accordion-collapse-heading-{{ $semesterId }}">
                    <div class="dark:bg-gray-900">
                        <div class="row">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-2">
                                @foreach ($matkulGroup as $matkul)
                                    @include('includes.card._dashboardcourse')
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}
@endsection
