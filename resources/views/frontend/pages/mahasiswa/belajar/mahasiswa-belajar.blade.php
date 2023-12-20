@extends('layouts.app')
@section('content')
    <div class="flex w-full justify-between items-center">
        <h1 class="md:text-4xl text-xl font-bold text-dark dark:text-white">
            {{ $pertemuan->judul_pertemuan }}
        </h1>
        @if (Auth::user()->dosen)
            <!-- Modal toggle -->
            <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                class="flex items-center flex-shrink-0 p-1 rounded-sm bg-blue-600 dark:bg-green-600 border border-transparent font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                <p class="mr-2">Materi</p>
            </button>
            @include('frontend.pages.mahasiswa.belajar.__modul-modal')
        @endif
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-8 mb-4 lg:gap-4">
        <div class="col-span-6">
            <div class="content">
                @if (Auth::user()->dosen)
                    {{ Breadcrumbs::render('mhsBelajar', $dosen_matkul, $pertemuan) }}
                @else
                    {{ Breadcrumbs::render('mhsBelajar', $matkulId, $pertemuan) }}
                @endif
                <article class="dark:text-white flex flex-col">
                    @include('frontend.pages.mahasiswa.belajar.section._youtube-section')
                    @include('frontend.pages.mahasiswa.belajar.section._video-section')
                    @include('frontend.pages.mahasiswa.belajar.section._image-section')






                </article>


            </div>
        </div>


        <div class="col-span-2 lg:mt-5">

            <div class="content-title flex items-center dark:text-white mt-3">
                <i class="fa-solid fa-book mr-2 ml-1" style="color: #4287ff;"></i>
                <h1 class="text-xl font-bold">General</h1>
            </div>
            <div class="grid lg:grid-cols-1">
                <div id="accordion-collapse" class="bg-white dark:bg-gray-800 shadow" data-accordion="collapse">

                    <div class="menu-general">
                        <h2 id="accordion-collapse-heading-1">
                            <button type="button"
                                class="flex items-center bg-gray justify-between w-full p-3 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-50 hover:bg-gray-100 dark:hover:bg-gray-800"
                                data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
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
                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                                <p class="text-sm text-gray-800 dark:text-gray-400">{{ $pertemuan->instruksi }}</p>
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

                                <ol class="relative border-l border-gray-200 dark:border-gray-700 flex-col gap-4">
                                    @foreach ($files as $file)
                                        <li class="mb-5 ml-4 flex md:flex-col justify-between">
                                            <div class="content">
                                                <div
                                                    class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                                </div>
                                                <time
                                                    class="mb-1 text-xs leading-none text-gray-400 dark:text-gray-500">{{ $file->created_at }}</time>
                                                <a href="#" class="flex">
                                                    <h3
                                                        class="text-md font-semibold hover:text-blue-600 text-gray-900 dark:text-white mb-1">
                                                        {{ $file->nama_file }}.{{ $file->extensi }}
                                                    </h3>
                                                    <div class="inline-flex">
                                                        <a href="{{ Storage::url($file->path_file) }}" target="_blank"
                                                            class="inline-flex items-center text-center px-2 py-1 text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"><svg
                                                                class="w-3.5 h-3.5 mr-2.5" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                                                                <path
                                                                    d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                                            </svg> Download</a>
                                                    </div>
                                                </a>
                                            </div>



                                        </li>
                                    @endforeach

                                    @foreach ($images as $image)
                                        <li class="mb-5 ml-4 flex md:flex-col justify-between">
                                            <div class="content">
                                                <div
                                                    class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                                </div>
                                                <time
                                                    class="mb-1 text-xs leading-none text-gray-400 dark:text-gray-500">{{ $file->created_at }}</time>
                                                <a href="#" class="flex">
                                                    <h3
                                                        class="text-md font-semibold hover:text-blue-600 text-gray-900 dark:text-white mb-1">
                                                        {{ $image->nama_file }}.{{ $image->extensi }}
                                                    </h3>
                                                    <div class="inline-flex">
                                                        <a href="{{ Storage::url($image->path_file) }}" target="_blank"
                                                            class="inline-flex items-center text-center px-2 py-1 text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"><svg
                                                                class="w-3.5 h-3.5 mr-2.5" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                                                                <path
                                                                    d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                                            </svg> Download</a>
                                                    </div>
                                                </a>
                                            </div>



                                        </li>
                                    @endforeach
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
                                    @foreach ($tugas as $tgs)
                                        <li class="mb-2 mt-2 ml-4 flex flex-col">
                                            <div
                                                class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                            </div>
                                            <div class="tenggat mb-2">
                                                <span
                                                    class="w-40 bg-red-100 text-red-800 text-xs mr-2 px-2.5 rounded dark:bg-gray-900 dark:text-red-400 border border-red-400">
                                                    {{ Carbon\Carbon::parse($tgs->tgl_tenggat)->translatedFormat('l, Y-m-d') }}
                                                </span>
                                            </div>
                                            <a href="{{ route('tugas.show', ['tuga' => $tgs->id]) }}"
                                                class="text-sm font-semibold text-gray-900 dark:text-white dark:hover:text-blue-400 hover:text-blue-600">{{ $tgs->judul_tugas }}</a>
                                        </li>
                                    @endforeach
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
