@extends('layouts.app')
@section('content')
    <article class="bg-gray-50 dark:bg-gray-800 p-5 mb-5">
        <div class="flex gap-2 items-center">
            <div class="bg-blue-500 border dark:border-gray-800 rounded-md px-4 py-6 inline-flex items-center"
                style="height: 100%; width: 50px;">
                <i class="fa-solid fa-file-arrow-up fa-lg text-white"></i>
            </div>

            <div>
                <h1 class="text-xl lg:text-3xl font-bold text-dark dark:text-white">
                    Tugas: {{ $tugas->pertemuan->judul_pertemuan }}</h1>
                <div class="hidden md:block">
                    {{ Breadcrumbs::render('mhsTugas', $matkulId, $pertemuanId, $tugas) }}
                </div>

            </div>

        </div>


        <article class="dark:text-white flex flex-col gap-2 mt-4">

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
                    <h1 class="font-bold dark:text-white">{{ $tugas->judul_tugas }}</h1>
                    <p class="text-sm tracking-normal mb-5">{{ $tugas->deskripsi }}.</p>

                    <div id="accordion-collapse" data-accordion="collapse">
                        <h2 id="accordion-collapse-heading-2">
                            <button type="button"
                                class="flex items-center justify-between w-full p-2 font-medium text-left text-gray-800 border border-gray-300 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                                aria-controls="accordion-collapse-body-2">
                                <span class="font-bold flex items-center">
                                    <svg class="w-5 h-5 mr-2 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                            clip-rule="evenodd"></path>
                                    </svg>Instruksi</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">

                                <!--Instruksi-->
                                <div class="deskripsi">
                                    <p class="text-sm tracking-normal">{{ $tugas->instruksi }}.</p>
                                    @foreach ($tugas->tgs_file as $file)
                                        <div class="flex items-center">
                                            <div class="mx-2 mt-3">
                                                <i class="fa-solid fa-arrow-turn-up fa-rotate-90"></i>
                                            </div>
                                            <div class="p-2 bg-blue-500 text-white dark:bg-blue-600 rounded w-24 mt-4">
                                                <a class="flex" href="{{ Storage::url($file->path_file) }}">
                                                    <i class="fas fa-download text-xs"></i>
                                                    <span class="text-xs ml-2">Download</span>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!--Instruksi End-->


                            </div>
                        </div>
                    </div>











                    <ul
                        class="flex text-xs mt-5 md:text-sm font-medium text-gray-900 bg-white border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <div class="w-64">
                            <li class="w-full py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                <p class="ml-2">Diberikan</p>
                            </li>
                            <li class="w-full ml-2 py-2 dark:border-gray-600">Batas Pengumpulan</li>
                        </div>
                        <div class="w-full">
                            <li class="w-full px-4 py-2 border-l border-b border-gray-200 dark:border-gray-600">
                                {{ Carbon\Carbon::parse($tugas->created_at)->translatedFormat('l, d-m-Y') }}</li>
                            <li class="w-full px-4 py-2 border-l dark:border-gray-600">
                                {{ Carbon\Carbon::parse($tugas->tgl_tenggat)->translatedFormat('l, d-m-Y') }}</li>
                        </div>
                    </ul>
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
                                {{ $enrolled->count() }}</li>
                            <li class="w-full px-4 py-2 border-y dark:border-gray-600">0 / {{ $enrolled->count() }} </li>
                            <div class="w-full px-4 py-2 dark:border-gray-600" id="countdown"></div>

                        </div>
                    </ul>
                </div>
            </div>

        </article>

    </article>
    <script>
        const startDate = new Date("{{ $startDate }}").getTime();
        const dueDate = new Date("{{ $dueDate }}").getTime();
        const countdownElement = document.getElementById('countdown');

        // Update the countdown timer every second
        function updateCountdown() {
            const currentDate = new Date().getTime();

            if (currentDate < dueDate) {
                const timeRemaining = dueDate - currentDate;
                const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                countdownElement.innerHTML = `${days} Hari, ${hours} Jam, ${minutes} Menit, ${seconds} Detik`;
            } else {
                countdownElement.innerHTML = "Countdown expired!";
            }
        }

        setInterval(updateCountdown, 1000);
    </script>
@endsection
