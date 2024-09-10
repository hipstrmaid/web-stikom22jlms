@extends('layouts.app')
@section('content')
    <h1
        class="mb-1 text-2xl md:text-lg font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">
        Selamat datang, Admin!</h1>
    <x-breadcrumbs></x-breadcrumbs>


    <div class="row">
        <div class="bg-gray-50 shadow p-5 border dark:border-gray-600 dark:bg-gray-900">
            <div class="title text-lg dark:text-white font-bold">
                <h1>Data User</h1>
            </div>

            <div class="col">
                <div class="bg-gray-100 dark:bg-gray-900">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                        <div class="bg-white dark:bg-gray-800 p-4 shadow-md ">
                            <h6 class="text-gray-500 dark:text-gray-50 text-sm mb-2">Mahasiswa</h6>
                            <div class="flex justify-between items-center">
                                <p class="text-lg dark:text-green-200">{{ $mahasiswaTotal }}</p>
                                <i class="fas fa-user-graduate text-3xl text-gray-700"></i>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 p-4 shadow-md">
                            <h6 class="text-gray-500 dark:text-gray-50 text-sm mb-2">Dosen</h6>
                            <div class="flex justify-between items-center">
                                <p class="text-lg dark:text-green-200">{{ $dosenTotal }}</p>
                                <i class="fas fa-chalkboard-teacher text-3xl text-gray-700"></i>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 p-4 shadow-md">
                            <h6 class="text-gray-500 dark:text-gray-50 text-sm mb-2">BAAK</h6>
                            <div class="flex justify-between items-center">
                                <p class="text-lg dark:text-green-200">{{ $baakTotal }}</p>
                                <i class="fas fa-user-tie text-3xl text-gray-700"></i>

                            </div>
                        </div>
                        <div class="bg-white dark:bg-gray-800 p-4 shadow-md">
                            <h6 class="text-gray-500 dark:text-gray-50 text-sm mb-2">Admin</h6>
                            <div class="flex justify-between items-center">
                                <p class="text-lg dark:text-green-200">{{ $adminTotal }}</p>
                                <i class="fas fa-user-shield text-3xl text-gray-700"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=" mt-4 bg-gray-50 border shadow p-5 dark:border-gray-600 dark:bg-gray-900">
            <div class="title text-lg dark:text-white font-bold">
                <h1>Data Umum</h1>
            </div>


            <div class="col mb-4">
                <div class="bg-gray-100 dark:bg-gray-900">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                        <div class="bg-white dark:bg-gray-800 p-4 shadow-md ">
                            <h6 class="text-gray-500 dark:text-gray-50 text-sm mb-2">Mata Kuliah</h6>
                            <div class="flex justify-between items-center">
                                <p class="text-lg dark:text-green-200">{{ $matkulTotal }}</p>
                                <i class="fas fa-book text-3xl text-gray-700"></i>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 p-4 shadow-md">
                            <h6 class="text-gray-500 dark:text-gray-50 text-sm mb-2">Program Studi</h6>
                            <div class="flex justify-between items-center">
                                <p class="text-lg dark:text-green-200">{{ $prodiTotal }}</p>
                                <i class="fas fa-graduation-cap text-3xl text-gray-700"></i>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 p-4 shadow-md">
                            <h6 class="text-gray-500 dark:text-gray-50 text-sm mb-2">Pertemuan</h6>
                            <div class="flex justify-between items-center">
                                <p class="text-lg dark:text-green-200">{{ $pertemuanTotal }}</p>
                                <i class="fas fa-calendar-alt text-3xl text-gray-700"></i>

                            </div>
                        </div>
                        <div class="bg-white dark:bg-gray-800 p-4 shadow-md">
                            <h6 class="text-gray-500 dark:text-gray-50 text-sm mb-2">Materi</h6>
                            <div class="flex justify-between items-center">
                                <p class="text-lg dark:text-green-200">{{ $materiTotal }}</p>
                                <i class="fas fa-file-alt text-3xl text-gray-700"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
