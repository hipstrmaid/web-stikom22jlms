@extends('layouts.app')
@section('content')
    <article class="bg-gray-50 dark:bg-gray-800 p-5">
        <div class="flex items-center">
            <div class="bg-blue-500 border dark:border-gray-800 rounded-md px-4 py-6 inline-flex items-center mr-2">
                <i class="fa-solid fa-file-arrow-up fa-lg text-white"></i>
            </div>
            <div>
                <h1 class="text-3xl font-bold pt-4 lg:pt-0 text-dark dark:text-white">Tugas UAS</h1>
                <p class="text-xs dark:text-white">Pertemuan 1: Pengenalan Database</p>
            </div>
        </div>

        <article class="dark:text-white flex flex-col gap-5 mt-4">

            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                    data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab"
                            data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">Tugas</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                            aria-controls="dashboard" aria-selected="false">Mengumpul</button>
                    </li>
                </ul>
            </div>
            <div id="myTabContent">
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                    aria-labelledby="profile-tab">
                    <ul
                        class="flex text-xs md:text-sm font-medium text-gray-900 bg-white border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <div class="w-64">
                            <li class="w-full py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                <p class="ml-2">Diberikan</p>
                            </li>
                            <li class="w-full ml-2 py-2 dark:border-gray-600">Batas Pengumpulan</li>
                        </div>
                        <div class="w-full">
                            <li class="w-full px-4 py-2 border-l border-b border-gray-200 dark:border-gray-600">
                                Sabtu, 14-10-2001</li>
                            <li class="w-full px-4 py-2 border-l dark:border-gray-600"> Sabtu, 17-5-2001</li>
                        </div>
                    </ul>

                    <div class="deskripsi mt-4">
                        <h1 class="text-lg font-bold">Instruksi</h1>
                        <hr class="h-px mb-2 bg-gray-200 border-0 dark:bg-gray-700">
                        <p class="text-sm tracking-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Consectetur magni
                            corporis itaque
                            reprehenderit voluptatum odit.</p>
                    </div>

                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                    aria-labelledby="dashboard-tab">
                    <ul
                        class="flex text-xs md:text-sm font-medium text-gray-900 bg-white border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <div class="w-64">
                            <li class="w-full ml-2 py-2 border-r dark:border-gray-600">Peserta</li>
                            <li class="w-full ml-2 py-2 border-y border-r dark:border-gray-600">Mengumpul</li>
                            <li class="w-full ml-2 py-2 border-r dark:border-gray-600">Waktu Tenggat</li>

                        </div>
                        <div class="w-full">
                            <li class="w-full px-4 py-2 border-gray-200 rounded-t-lg dark:border-gray-600">
                                18</li>
                            <li class="w-full px-4 py-2 border-y dark:border-gray-600">2 / 18</li>
                            <li class="w-full px-4 py-2 dark:border-gray-600">6 Hari, 27 Menit</li>

                        </div>
                    </ul>
                </div>
            </div>

        </article>

    </article>
@endsection
