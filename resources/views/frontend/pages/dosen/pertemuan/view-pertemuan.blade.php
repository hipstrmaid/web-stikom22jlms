@extends('layouts.app')
@section('content')
    <h1 class="mb-1 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">
        List Pertemuan</h1>
    {{ Breadcrumbs::render('indexPertemuan', $id_matkul) }}

    <div class="grid grid-cols-1 mb-5">
        <ul class="flex bg-gray-200 dark:bg-gray-900">
            <div class="flex items-center dark:border-gray-900 dark:bg-gray-900">
                <i class="fa-solid fa-lock ml-4 dark:text-white"></i>
                <h5 class="text-sm text-gray-900 dark:text-white py-2 ml-2 mr-4 font-bold">
                    <a href="{{ route('matkul.edit', $id_matkul->id) }}">Mata
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
            <div class="px-5 py-4 header-nav flex justify-between items-center">
                <a href="{{ route('pertemuan.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Pertemuan

                </a>
                <span class="ml-1 text-dark dark:text-white text-lg font-bold">Pertemuan {{ $pertemuans->count() }}</span>

            </div>
            <ul class="flex grid gap-2 mb-4 px-5">
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
