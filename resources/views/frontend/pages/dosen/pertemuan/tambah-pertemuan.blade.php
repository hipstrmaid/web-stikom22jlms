@extends('layouts.app')
@section('content')
    <h1 class="mb-1 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">
        Tambah Pertemuan aaaaaa</h1>
    <x-breadcrumbs></x-breadcrumbs>


    <div class="grid grid-cols-1 mb-5">
        <ul class="flex bg-gray-200 dark:bg-gray-900">
            <div class="bg-white border border-gray-200 border-b-0 rounded-t dark:border-gray-900 dark:bg-gray-800">
                <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold"><a
                        href="/matkul/edit-pertemuan">Tambah</a></h5>
            </div>
        </ul>



        <div class="bg-white text-sm border border-gray-200 border-t-0 dark:border-gray-900 dark:bg-gray-800">
            <ul class="grid w-full gap-2 mb-4 p-5">
                <li class="inline-flex justify-end">

                    <button type="button" data-modal-target="materi-modal" data-modal-toggle="materi-modal"
                        class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                            </path>
                        </svg>
                        Tambah Materi
                    </button>

                    <!-- Main modal -->
                    <div id="materi-modal" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="materi-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <!-- Modal header -->
                                <div class="px-6 py-4 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                                        Tambah Materi
                                    </h3>
                                </div>
                                <!-- Modal body -->
                                <div class="p-6">
                                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Connect with one of our
                                        available wallet providers or create a new one.</p>
                                    <ul class="my-4 space-y-3">
                                        <li>
                                            <a href="#"
                                                class="flex items-center p-3 text-base font-bold text-gray-900 rounded-sm bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">

                                                <span class="">
                                                    <i class="fas fa-info-circle"></i> <!-- Instruction icon -->

                                                </span>
                                                <span class="flex-1 ml-3 whitespace-nowrap">Instruksi</span>
                                                {{-- <span
                                                    class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400">Popular</span> --}}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex items-center p-3 text-base font-bold text-gray-900 rounded-sm bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">

                                                <span class="">
                                                    <i class="fas fa-clipboard-check"></i>
                                                </span>
                                                <span class="flex-1 ml-3 whitespace-nowrap">Tugas</span>
                                                {{-- <span
                                                    class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400">Popular</span> --}}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex items-center p-3 text-base font-bold text-gray-900 rounded-sm bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">

                                                <span class="">
                                                    <i class="fas fa-file"></i>
                                                </span>
                                                <span class="flex-1 ml-3 whitespace-nowrap">File</span>
                                                {{-- <span
                                                    class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400">Popular</span> --}}
                                            </a>
                                        </li>
                                    </ul>
                                    <div>
                                        <a href="#"
                                            class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                                            <svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M7.529 7.988a2.502 2.502 0 0 1 5 .191A2.441 2.441 0 0 1 10 10.582V12m-.01 3.008H10M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            Why do I need to connect with my wallet?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </li>

                <li>
                    <form>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white"><span>Judul
                                    pertemuan</span></label>
                            <input type="text" id="email" name="Judul_pertemuan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="cth. Pengenalan Adobe Photoshop" required>
                        </div>

                        <div class="mb-6">

                            <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Deskripsi</label>
                            <textarea id="message" rows="4" name="deskripsi"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                        </div>

                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Link
                                Youtube</label>
                            <input type="text" name="video_url"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="cth. https://youtu.be/dQw4w9WgXcQ" required>
                        </div>

                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Gambar</label>
                            <input name="gambar"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" id="file_input" type="file">
                        </div>


                        {{-- <div class="mb-6">

                            <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Instruksi
                                untuk Mahasiswa</label>
                            <textarea id="message" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="cth. Nonton video di sebelah lalu kerjakan tugas tertera..."></textarea>

                        </div>

                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Upload
                                File</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" id="file_input" type="file">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">DOC, PPT, EXCEL.
                            </p>
                        </div> --}}

                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    </form>
                </li>

            </ul>

        </div>


    </div>
@endsection
