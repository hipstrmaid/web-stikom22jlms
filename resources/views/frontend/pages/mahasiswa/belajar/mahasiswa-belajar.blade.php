@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-8 mb-4 lg:gap-4">

        <div class="col-span-6">
            <div class="content">
                <article class="dark:text-white">
                    <h1 class="text-4xl font-bold pt-4 lg:pt-0">{{ $pertemuan->judul_pertemuan }}</h1>
                    {{ Breadcrumbs::render('viewPertemuan', $pertemuan) }}
                    <div class="video-player mt-2 mb-2">
                        <iframe class="w-full max-w-full" height="300"
                            src="https://www.youtube.com/embed/{{ $pertemuan->video_url }}" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                    <div class="content-text tracking-normal text-gray-900 dark:text-gray-400">
                        <p>{{ $pertemuan->deskripsi }}</p>

                    </div>

                    <div id="accordion-collapse" class="bg-white dark:bg-gray-800 shadow" data-accordion="collapse">

                    </div>

                </article>


            </div>
        </div>


        <div class="col-span-2">
            <div class="content-title flex items-center dark:text-white mt-3">
                <i class="fa-solid fa-book mr-2" style="color: #4287ff;"></i>
                <h1 class="text-xl font-bold my-2 ">General</h1>
            </div>
            <div class="grid lg:grid-cols-1">

                <div id="accordion-collapse" class="bg-white dark:bg-gray-800 shadow" data-accordion="collapse">

                    <div class="menu-general">
                        <h2 id="accordion-collapse-heading-1">
                            <button type="button"
                                class="flex items-center bg-gray justify-between w-full p-3 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-50 hover:bg-gray-100 dark:hover:bg-gray-800"
                                data-accordion-target="#accordion-collapse-body-1" aria-expanded="false"
                                aria-controls="accordion-collapse-body-1">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-circle-question mr-2" style="color: #4287ff;"></i>
                                    <span>Instruksi</span>
                                </div>
                                <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </h2>

                        <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $pertemuan->deskripsi }}</p>
                            </div>
                        </div>


                        <h2 id="accordion-collapse-heading-2">
                            <button type="button"
                                class="flex items-center justify-between w-full p-3 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-50 hover:bg-gray-100 dark:hover:bg-gray-800"
                                data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                                aria-controls="accordion-collapse-body-2">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-file mr-3" style="color: #4287ff;"></i>
                                    <span>File</span>
                                </div>
                                <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">

                                <ol class="relative border-l border-gray-200 dark:border-gray-700">
                                    <li class="ml-6">
                                        <span
                                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                            <i class="fa-solid fa-file-doc w-3 h-3 text-blue-800 dark:text-blue-300"></i>
                                        </span>
                                        <h3
                                            class="flex items-center mb-1 text-base font-semibold text-gray-900 dark:text-white">
                                            File docs<span
                                                class="bg-blue-100 text-blue-800 text-sm font-sm mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ml-3">Latest</span>
                                        </h3>
                                        <time
                                            class="block mb-2 text-sm font-base leading-none text-gray-400 dark:text-gray-500">January
                                            13th, 2022</time>
                                        <a href="#"
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"><svg
                                                class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                                    clip-rule="evenodd"></path>
                                            </svg> Download File</a>
                                    </li>
                                </ol>

                            </div>
                        </div>

                    </div>

                    <div class="menu-tugas">
                        <h2 id="accordion-collapse-heading-3">
                            <button type="button"
                                class="flex items-center justify-between w-full p-3 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-50 hover:bg-gray-100 dark:hover:bg-gray-800"
                                data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                                aria-controls="accordion-collapse-body-3">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-tasks mr-2" style="color: #4287ff;"></i>
                                    <span>Tugas</span>
                                </div>
                                <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-3" class="hidden"
                            aria-labelledby="accordion-collapse-heading-3">
                            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">

                                <ol class="relative border-l border-gray-200 dark:border-gray-700">
                                    <li class="mb-5 mt-2 ml-4 flex flex-col">
                                        <div
                                            class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                        </div>
                                        {{-- <time
                                            class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Diberikan:
                                            Senin, 20 Juli 2023</time> --}}
                                        <div class="tenggat mb-2">
                                            <span
                                                class="w-40 bg-red-100 text-red-800 text-xs font-sm mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">Senin,
                                                20 Juli 2023</span>
                                        </div>
                                        <a href="#"
                                            class="text-sm font-semibold text-gray-900 dark:text-white dark:hover:text-blue-400 hover:text-blue-600">Buat
                                            Makalah
                                            minimal 15 Halaman</a>
                                    </li>
                                </ol>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="{{ asset('js/video.js') }}"></script>
@endsection
