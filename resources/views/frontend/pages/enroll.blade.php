@extends('layouts.app')
@section('content')
    <div class="content-head flex justify-between">
        <h1 class="text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">
            Daftar Mata Kuliah</h1>
    </div>
    {{ Breadcrumbs::render('enrollMatkul') }}

    <div class="py-2">
        <form method="POST">
            @csrf
            <div class="flex">
                <span
                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    <i class="fa-solid fa-key dark:text-white"></i>
                </span>
                <input type="text" name="kode_matkul"
                    class="rounded-none bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Kode">
            </div>
            <button
                class="w-full inline-flex items-center mt-2 justify-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Daftar<i class="fa-solid fa-arrow-right ml-2 bg-dark"></i>
            </button>
            <x-error-alert></x-error-alert>
            <x-success-alert></x-success-alert>
        </form>
    </div>
@endsection
