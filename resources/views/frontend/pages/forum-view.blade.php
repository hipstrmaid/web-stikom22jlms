@extends('layouts.app')
@section('content')
    <div class="content-head flex justify-between">
        <h1
            class="mb-1 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">
            Selamat Datang di Forum</h1>
    </div>

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
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Forum</span>
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
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Topik</span>
                </div>
            </li>
        </ol>
    </nav>


    <div class="row flex flex-col gap-4">
        <div class="grid mb-4 bg-white text-sm border border-gray-200 border-t-0 dark:border-gray-900 dark:bg-gray-800">
            <div class="panel-head flex items-center gap-4 p-4">

                <div class="flex flex-col w-full  dark:text-gray-50 dark:text-gray-400">
                    <h1 class="text-2xl font-bold">Topik</h1>
                    <p class="tracking-tight text-gray-500 ">Yang sedang dibicarakan saat
                        ini.</p>
                </div>

                <button class="flex items-center p-2 dark:text-gray-50 hover:bg-gray-100 dark:hover:bg-gray-600">
                    <i class="fa-solid fa-plus"></i>
                    <a href="#" class="text-bold">Tambah</a>
                </button>
            </div>
            <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
            <div class="panel-content p-4 flex">
                <div class="logo-topik text-blue-400 dark:text-white p-2">
                    <i class="fa-solid fa-file-lines fa-2xl"></i>
                </div>
                <div class="judul-topik">
                    <a href="#" class="text-md text-base dark:text-gray-50">Bagaimana menurut kalian dengan materi
                        tadi?</a>
                    <div class="info-topik flex text-gray-500 text-sm gap-2">
                        <p class="">oleh</p>
                        <a href="" class="text-sm text-blue-400 dark:text-blue-400">Muhammad
                            Rizky</a>
                        <p>| 2 days ago</p>
                    </div>
                </div>

            </div>
            <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
            <div class="panel-content p-4 flex">
                <div class="logo-topik text-blue-400 dark:text-white p-2">
                    <i class="fa-solid fa-file-lines fa-2xl"></i>
                </div>
                <div class="judul-topik">
                    <a href="#" class="text-md text-base dark:text-gray-50">Bagaimana menurut kalian dengan materi
                        tadi?</a>
                    <div class="info-topik flex text-gray-500 text-sm gap-2">
                        <p class="">oleh</p>
                        <a href="" class="text-sm text-blue-400 dark:text-blue-400">Muhammad
                            Rizky</a>
                        <p>| 2 days ago</p>
                    </div>
                </div>


            </div>



        </div>
    </div>
@endsection
