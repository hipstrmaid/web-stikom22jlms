@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="grid grid-cols-1 lg:grid-cols-8 gap-4 mb-4 h-46">



            <div class="lg:col-span-6">
                <div class="content-heading mt-2 lg:mt-0">
                    <h1
                        class="text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">
                        {{ $matkul->nama_matkul }}
                    </h1>
                    {{ Breadcrumbs::render('previewMatkul', $matkul) }}
                    <p class="pt-3 font-normal text-gray-800 dark:text-gray-400">{{ $matkul->deskripsi }}</p>
                </div>

                <div class="content-data">
                    <hr class="mt-3 border-gray-200 sm:mx-auto dark:border-gray-700" />
                    <div class="content-title flex items-center dark:text-white mt-2">
                        <i class="fa-solid fa-circle-question mr-2" style="color: #4287ff;"></i>
                        <h1 class="text-xl font-bold my-2 ">Informasi</h1>
                    </div>

                    <ul class="grid w-full gap-4 mb-4  dark:text-white" id="accordion-collapse" data-accordion="collapse">
                        <li>
                            <h2 id="accordion-collapse-heading-1">
                                <button type="button"
                                    class="flex shadow items-center justify-between w-full p-5 font-medium text-left text-gray-900 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800"
                                    data-accordion-target="#accordion-collapse-body-1" aria-expanded="false"
                                    aria-controls="accordion-collapse-body-1">
                                    <span><i class="fa-solid fa-circle-exclamation mr-2"
                                            style="color: #ffbf0f;"></i>Pemberitahuan <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Baru</span></span>

                                    <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-1" class="hidden"
                                aria-labelledby="accordion-collapse-heading-1">
                                <div class="p-5 shadow border border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                    <ol class="relative border-gray-200 dark:border-gray-700 ml-10">
                                        <li class="ml-6">
                                            <span
                                                class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                                <svg aria-hidden="true" class="w-3 h-3 text-blue-800 dark:text-blue-300"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </span>
                                            {{-- <h3
                                                class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                                Pemberitahuan
                                            </h3> --}}
                                            <time
                                                class="block mb-2 pt-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $matkul->updated_at }}</time>
                                            <p class="mb-4 text-base font-normal text-gray-800 dark:text-gray-400">
                                                {{ $matkul->pemberitahuan ?? 'Tidak ada pemberitahuan.' }}</p>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </li>

                        <li>
                            <h2 id="accordion-collapse-heading-2">
                                <button type="button"
                                    class="flex shadow items-center justify-between w-full p-5 font-medium text-left text-gray-900 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-blue-800"
                                    data-accordion-target="#accordion-collapse-body-2" aria-expanded="true"
                                    aria-controls="accordion-collapse-body-2">
                                    <span><i class="fa-solid fa-list-ul mr-2"></i>List Pertemuan</span>
                                    <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-2" class="hidden"
                                aria-labelledby="accordion-collapse-heading-2">
                                <div class="p-5 shadow border border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                    @if (Auth::user()->dosen)
                                        <a href="{{ route('pertemuan.create', $matkul->id) }}"
                                            class="inline-flex items-center rounded-sm text-sm p-1 bg-gray-600 mb-2 border border-transparent text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                            <i class="fas fa-plus mr-2"></i>Tambah
                                        </a>
                                    @endif
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($pertemuans as $pertemuan)
                                        <ul
                                            class="w-full text-sm font-medium text-gray-900 bg-white rounded border border-gray-200 dark:bg-gray-800 dark:border-gray-800 dark:text-white">

                                            @php
                                                $i++;
                                            @endphp
                                            <li>
                                                <a href="{{ route('pertemuan.show', ['pertemuan' => $pertemuan->id]) }}"
                                                    aria-current="true"
                                                    class="flex justify-between items-center block w-full px-4 py-2 border border-gray-200 cursor-pointer hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-blue-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                                    <p>Pertemuan {{ $i }} : <span class="text-blue-500">
                                                            {{ $pertemuan->judul_pertemuan }}</span>
                                                    </p>
                                                    <i class="w-auto fa-solid fa-lock-open dark:text-white"></i>
                                                </a>
                                            </li>

                                        </ul>
                                    @endforeach
                                </div>

                            </div>
                        </li>

                    </ul>
                </div>


            </div>

            <div class="lg:col-span-2">
                <div class="bg-white border border-gray-200 rounded-t shadow dark:border-gray-900 dark:bg-gray-800">
                    <h5 class="text-gray-900 dark:text-white py-2 px-4 font-bold">Detail Mata Kuliah</h5>
                </div>
                <div class="bg-white text-sm border border-gray-200 dark:border-gray-900 dark:bg-gray-800">
                    <ul class="grid w-full gap-2 mt-4 mb-4">

                        <li class="flex items-center">
                            <i class="fa-solid fa-user ml-4 dark:text-white"></i>
                            <p class="dark:text-white px-2">{{ $matkul->dosen->nama }}</p>
                        </li>

                        <li class="flex items-center">
                            <i class="fa-solid fa-calendar ml-4 dark:text-white"></i>
                            <p class="dark:text-white px-2">{{ $matkul->hari }}, {{ $matkul->jam }}</p>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-key ml-4 dark:text-white"></i>
                            <p class="dark:text-white px-2">{{ $matkul->kode_enroll }}</p>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-users ml-3  dark:text-white"></i>
                            <p class="dark:text-white px-2">{{ $totalUser->count() }}</p>
                        </li>

                    </ul>

                </div>
                <div class="bg-white border border-gray-200 rounded-b shadow dark:border-gray-900 dark:bg-gray-800">
                    @isset($lastPertemuan)
                        <div class="p-2">
                            <a href="{{ route('pertemuan.show', ['pertemuan' => $lastPertemuan->id]) }}"
                                class="w-full inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Pertemuan {{ $pertemuans->count() }}<i class="fa-solid fa-arrow-right ml-2 bg-dark"></i>
                            </a>
                        </div>
                    @endisset
                </div>
            </div>




        </div>
    </div>
@endsection
