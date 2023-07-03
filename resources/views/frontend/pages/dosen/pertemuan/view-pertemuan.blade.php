@extends('app')
@section('content')
    <h1 class="mb-1 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">
        List Pertemuan</h1>
    <nav class="flex mb-4 rounded" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="#"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                        </path>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <a href="#"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Projects</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Flowbite</span>
                </div>
            </li>
        </ol>
    </nav>


    <div class="grid grid-cols-1 mb-5">
        <ul class="flex bg-gray-200 dark:bg-gray-900">
            <div class="flex items-center dark:border-gray-900 dark:bg-gray-900">
                <i class="fa-solid fa-lock ml-4 dark:text-white"></i>
                <h5 class="text-sm text-gray-900 dark:text-white py-2 ml-2 mr-4 font-bold">Mata
                    Kuliah</h5>
            </div>
            <div
                class="flex items-center  bg-white border border-gray-200 border-b-0 rounded-t dark:border-gray-900 dark:bg-gray-800 ">
                <i class="fa-solid fa-address-card ml-4 dark:text-white"></i>
                <h5 class="text-sm text-gray-900 dark:text-white py-2 ml-2 mr-4 font-bold"><a
                        href="/matkul/tambah-pertemuan">Pertemuan</a></h5>
            </div>
            <div class="flex items-center dark:border-gray-900 dark:bg-gray-900">
                <i class="fa-solid fa-users ml-4 dark:text-white"></i>
                <h5 class="text-sm text-gray-900 dark:text-white py-2 ml-2 mr-4 font-bold">Peserta</h5>
            </div>
        </ul>

        <div class="bg-white text-sm border border-gray-200 border-t-0 dark:border-gray-900 dark:bg-gray-800">
            <ul class="flex grid gap-2 mb-4 p-5">
                <li class="flex">
                    <a href="/matkul/pertemuan/belajar" class="w-full">
                        {{-- <span class="border border-gray-300 py-1 px-6 mr-2 font-bold text-md rounded-lg">1</span> --}}
                        <h1 class="bg-gray-200 border rounded-l-lg  border-gray-300 w-full py-2 px-3 text-bold">
                            Pertemuan 1:
                            Instalasi
                            Photoshop</h1>

                    </a>
                    <a href="/dosen/edit-pertemuan" class="flex items-center justify-center bg-blue-400 p-2 rounded-r-lg">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <h1 class="ml-1 text-sm font-bold">Edit</h1>
                    </a>
                </li>
            </ul>

        </div>


    </div>
@endsection
