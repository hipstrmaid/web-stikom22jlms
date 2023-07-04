@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-8 mb-4 lg:gap-2">

        <div class="col-span-6 order-2 lg:order-1">
            <div class="content">
                <article class="dark:text-white">
                    <h1 class="text-4xl font-bold mb-4 pt-4 lg:pt-0">{{ $matkul->nama_matkul }}</h1>
                    <div class="video-player mt-2 mb-2">
                        <iframe class="w-full max-w-full" height="400"
                            src="https://www.youtube.com/embed/{{ $matkul->video_url }}" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                        <div class="content-text tracking-normal text-gray-900 dark:text-gray-400 mt-2">
                            <p>{{ $matkul->deskripsi }}</p>

                        </div>
                    </div>
                </article>
            </div>
            <hr class="mt-6 border-gray-200 sm:mx-auto dark:border-gray-700" />
            <div class="content-title flex items-center dark:text-white mt-5">
                <i class="fa-solid fa-circle-question mr-2" style="color: #4287ff;"></i>
                <h1 class="text-xl font-bold my-2 ">Topik</h1>
            </div>
            <div class="content-data">
                <ul class="grid w-full gap-4 mb-4  dark:text-white" id="accordion-collapse" data-accordion="collapse">
                    <li>
                        <h2 id="accordion-collapse-heading-2">
                            <button type="button"
                                class="rounded-lg flex shadow items-center justify-between w-full p-5 font-medium text-left text-gray-900 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-blue-800"
                                data-accordion-target="#accordion-collapse-body-2" aria-expanded="true"
                                aria-controls="accordion-collapse-body-2">
                                <span><i class="fa-solid fa-list-ul mr-2"></i>Apa yang akan anda pelajari</span>
                                <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">

                            <div class="p-5 shadow border border-gray-200 dark:border-gray-700 dark:bg-gray-900">

                                <ul
                                    class="w-full text-sm font-medium text-gray-900 bg-white rounded border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <li>
                                        <a href="#" aria-current="false"
                                            class="flex justify-between items-center block w-full px-4 py-2 border border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-blue-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                            <p>Pertemuan 1</p>
                                            <i class="w-auto fa-solid fa-lock dark:text-white"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" aria-current="true"
                                            class="flex justify-between items-center block w-full px-4 py-2 border border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-blue-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                            <p>Pertemuan 2</p>
                                            <i class="w-auto fa-solid fa-lock dark:text-white"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" aria-current="true"
                                            class="flex justify-between items-center block w-full px-4 py-2 border border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-blue-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                            <p>Pertemuan 3</p>
                                            <i class="w-auto fa-solid fa-lock dark:text-white"></i>
                                        </a>
                                    </li>

                                </ul>

                            </div>
                        </div>
                    </li>

                </ul>
            </div>

        </div>
        <div class="col-span-2 order-1 lg:order-2">
            <div class="grid lg:grid-cols-1">
                <div class="col mb-4 shadow">
                    <div class="bg-white border border-gray-200 shadow dark:border-gray-900 ">
                        <h5
                            class="text-gray-900 dark:text-white py-2 px-4 font-bold text-center bg-gray-200 dark:bg-gray-800">
                            Pertemuan
                            Terakhir</h5>
                    </div>
                    <div class="bg-white border border-gray-200 shadow dark:border-gray-900 dark:bg-gray-800">
                        <div class="p-2">
                            <a href="/matkul/pertemuan"
                                class="w-full inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-900 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-green-800">
                                Masuk
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col shadow">
                    <div class="bg-white border border-gray-200 rounded-t dark:border-gray-900 ">
                        <h5
                            class="text-gray-900 dark:text-white py-2 px-4 font-bold text-center bg-gray-200 dark:bg-gray-800">
                            Dosen
                            Pengampu</h5>
                    </div>
                    <div
                        class="flex justify-center bg-white p-4 border border-gray-200  dark:border-gray-900 dark:bg-gray-800">
                        <div class="img-profile">
                            <img src="{{ Storage::url($matkul->dosen->foto) }}" alt="Dosen Foto">

                        </div>
                    </div>
                    <div class="bg-white text-sm border border-gray-200 rounded-b dark:border-gray-900 dark:bg-gray-800">
                        <ul class="grid w-full gap-2 mt-4 mb-4">

                            <li class="flex items-center">
                                <i class="fa-solid fa-user ml-4 dark:text-white"></i>
                                <p class="dark:text-white px-2">{{ $matkul->dosen->nama }}</p>
                            </li>

                            <li class="flex items-center">
                                <i class="fa-solid fa-calendar ml-4 dark:text-white"></i>
                                <p class="dark:text-white px-2">{{ $matkul->hari }}</p>
                            </li>
                            <li class="flex items-center">
                                <i class="fa-solid fa-clock ml-4 dark:text-white"></i>
                                <p class="dark:text-white px-2">14:55</p>
                            </li>
                            <li class="flex items-center">
                                <i class="fa-solid fa-users ml-4 dark:text-white"></i>
                                <p class="dark:text-white px-2">22</p>
                            </li>

                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
