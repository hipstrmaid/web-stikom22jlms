@extends('layouts.app')
@section('content')
    <h1 class="mb-1 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">
        List Pertemuan</h1>
    <x-breadcrumbs></x-breadcrumbs>

    <div class="grid grid-cols-1 mb-5">
        <ul class="flex bg-gray-200 dark:bg-gray-900">
            <div class="flex items-center dark:border-gray-900 dark:bg-gray-900">
                <i class="fa-solid fa-lock ml-4 dark:text-white"></i>
                <h5 class="text-sm text-gray-900 dark:text-white py-2 ml-2 mr-4 font-bold">
                    <a href="{{ route('matkul.edit', $matkul->id) }}">Mata
                        Kuliah</a>
                </h5>
            </div>
            <div
                class="flex items-center  bg-white border border-gray-200 border-b-0 rounded-t dark:border-gray-900 dark:bg-gray-800 ">
                <i class="fa-solid fa-address-card ml-4 dark:text-white"></i>
                <h5 class="text-sm text-gray-900 dark:text-white py-2 ml-2 mr-4 font-bold"><a
                        href="{{ route('pertemuan.index') }}">Pertemuan</a></h5>
            </div>
            <div class="flex items-center dark:border-gray-900 dark:bg-gray-900">
                <i class="fa-solid fa-users ml-4 dark:text-white"></i>
                <h5 class="text-sm text-gray-900 dark:text-white py-2 ml-2 mr-4 font-bold">Peserta</h5>
            </div>
        </ul>

        <div class="bg-white text-sm border border-gray-200 border-t-0 dark:border-gray-900 dark:bg-gray-800">
            <div class="p-3 header-nav flex justify-between items-center">
                <span>{{ $pertemuans->count() }}</span>
                <button class="p-2 bg-blue-600 text-white rounded-lg">
                    <a href="{{ route('pertemuan.create') }}"> <i class="fa-solid fa-plus"></i> Buat Pertemuan</a>
                </button>
            </div>
            <ul class="flex grid gap-2 mb-4 p-5">
                @foreach ($pertemuans as $pertemuan)
                    <li class="flex">
                        <a href="/matkul/pertemuan/belajar" class="w-full">
                            <h1 class="bg-gray-200 border rounded-l-lg  border-gray-300 w-full py-2 px-3 text-bold">
                                Pertemuan 1:{{ $pertemuan->nama_pertemuan }}</h1>
                        </a>
                        <a href="/dosen/edit-pertemuan"
                            class="flex items-center justify-center bg-blue-400 p-2 rounded-r-lg">
                            <i class="fa-solid fa-pen-to-square"></i>
                            <h1 class="ml-1 text-sm font-bold">Edit</h1>
                        </a>
                    </li>
                @endforeach

            </ul>

        </div>


    </div>
@endsection
