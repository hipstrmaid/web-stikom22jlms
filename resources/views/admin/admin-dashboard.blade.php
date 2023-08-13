@extends('layouts.app')
@section('content')
    <h1 class="mb-1 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">
        Selamat datang, Admin!</h1>
    <x-breadcrumbs></x-breadcrumbs>


    <div class="row">
        <div class="bg-gray-100 dark:bg-gray-900">
            <div class="grid grid-cols-4 gap-4">
                <div class="bg-white dark:bg-gray-800 p-4 shadow-md">
                    <h6 class="text-gray-500 dark:text-gray-50 text-sm mb-2">Mahasiswa</h6>
                    <p class="text-lg dark:text-green-200">{{ $mahasiswaTotal }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-4 shadow-md">
                    <h6 class="text-gray-500 dark:text-gray-50 text-sm mb-2">Dosen</h6>
                    <p class="text-lg dark:text-green-200">{{ $dosenTotal }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-4 shadow-md">
                    <h6 class="text-gray-500 dark:text-gray-50 text-sm mb-2">BAAK</h6>
                    <p class="text-lg dark:text-green-200">{{ $baakTotal }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-4 shadow-md">
                    <h6 class="text-gray-500 dark:text-gray-50 text-sm mb-2">Admin</h6>
                    <p class="text-lg dark:text-green-200">{{ $adminTotal }}</p>
                </div>

            </div>
        </div>

    </div>
@endsection
