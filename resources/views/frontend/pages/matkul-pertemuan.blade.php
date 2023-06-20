@extends('frontend.app')
@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-8 mb-4 lg:gap-2">

        <div class="col-span-6 order-2 lg:order-1">
            <div class="content">
                <article class="dark:text-white">
                    <h1 class="text-4xl font-bold mb-4 pt-4 lg:pt-0">Pemrograman Berbasis Objek</h1>
                    <div class="content-text tracking-normal text-gray-900 dark:text-gray-400">
                        <p>Make better videos with the ultimate course on video production, planning, cinematography,
                            editing & distribution.</p>
                        <p>The passage experienced a surge in popularity during the 1960s when Letraset used it on their
                            dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their
                            software.</p>
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
                        <h2 id="accordion-collapse-heading-1">
                            <button type="button"
                                class="rounded-lg flex shadow items-center justify-between w-full p-5 font-medium text-left text-gray-900 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800"
                                data-accordion-target="#accordion-collapse-body-1" aria-expanded="false"
                                aria-controls="accordion-collapse-body-1">
                                <span><i class="fa-solid fa-circle-exclamation mr-2"
                                        style="color: #ffbf0f;"></i>Pemberitahuan</span>
                                <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                            <div class="p-5 shadow border border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                <ol class="relative border-l border-gray-200 dark:border-gray-700">
                                    <li class="mb-10 ml-6">
                                        <span
                                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                            <svg aria-hidden="true" class="w-3 h-3 text-blue-800 dark:text-blue-300"
                                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                        <h3
                                            class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                            Flowbite
                                            Application UI v2.0.0 <span
                                                class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ml-3">Latest</span>
                                        </h3>
                                        <time
                                            class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released
                                            on January 13th, 2022</time>
                                        <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Get access to
                                            over
                                            20+ pages
                                            including a dashboard layout, charts, kanban board, calendar, and pre-order
                                            E-commerce &
                                            Marketing pages.</p>
                                        <a href="#"
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"><svg
                                                class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                                    clip-rule="evenodd"></path>
                                            </svg> Download ZIP</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </li>

                    <li>
                        <h2 id="accordion-collapse-heading-2">
                            <button type="button"
                                class="rounded-lg flex shadow items-center justify-between w-full p-5 font-medium text-left text-gray-900 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-blue-800"
                                data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                                aria-controls="accordion-collapse-body-2">
                                <span><i class="fa-solid fa-list-ul mr-2"></i>Pertemuan</span>
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
                                        <a href="#" aria-current="true"
                                            class="flex justify-between items-center block w-full px-4 py-2 border border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-blue-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                            <p>Pertemuan 1</p>
                                            <i class="w-auto fa-solid fa-lock-open dark:text-white"></i>
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
                            <a href="/matkul/pertemuan/belajar"
                                class="w-full inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-900 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-green-800">
                                Pertemuan 16
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
                            <img src="{{ asset('assets/img/profile2.jpg') }}" alt="user photo" />
                        </div>
                    </div>
                    <div class="bg-white text-sm border border-gray-200 rounded-b dark:border-gray-900 dark:bg-gray-800">
                        <ul class="grid w-full gap-2 mt-4 mb-4">

                            <li class="flex items-center">
                                <i class="fa-solid fa-user ml-4 dark:text-white"></i>
                                <p class="dark:text-white px-2">Dosen : Angelina Jolie</p>
                            </li>

                            <li class="flex items-center">
                                <i class="fa-solid fa-calendar ml-4 dark:text-white"></i>
                                <p class="dark:text-white px-2">Selasa</p>
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
