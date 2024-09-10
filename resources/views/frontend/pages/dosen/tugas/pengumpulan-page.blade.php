@extends('layouts.app')
@section('content')
    <article class="bg-gray-50 dark:bg-gray-800 p-5">

        <div class="flex gap-2 items-center">
            <div class="bg-blue-500 border dark:border-gray-800 rounded-md px-4 py-6 inline-flex items-center h-full">
                <i class="fa-solid fa-file-arrow-up fa-lg text-white"></i>
            </div>


            <div>
                <h1 class="text-xl lg:text-1xl font-bold text-dark dark:text-white">
                    Tugas: {{ $tugass->judul_tugas }} </h1>
                <div class="md:block dark:text-white">
                    Pertemuan: {{ $tugass->pertemuan->judul_pertemuan }}
                </div>
            </div>
        </div>
        <hr class="w-full h-1 mt-2 bg-gray-200 rounded dark:bg-gray-700">
        <p class="mt-5 ml-1 font-bold dark:text-white">Submission Status</p>

        <ul
            class="flex mb-5 text-xs md:text-sm font-medium text-gray-900 bg-white border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <div class="w-64">
                <li class="w-full ml-2 py-2 border-r dark:border-gray-600">Peserta</li>
                <li class="w-full ml-2 py-2 border-y border-r dark:border-gray-600">Mengumpul</li>
                <li class="w-full ml-2 py-2 border-r dark:border-gray-600">Waktu Tenggat</li>
            </div>
            <div class="w-full">
                <li class="w-full px-4 py-2 border-gray-200 rounded-t-lg dark:border-gray-600">
                    {{ $enrolled->count() }}</li>
                <li class="w-full px-4 py-2 border-y dark:border-gray-600">
                    {{ $enrolled->count() }} / {{ $submitted }}</li>
                <div class="w-full px-4 py-2 dark:border-gray-600" id="countdown"></div>
            </div>
        </ul>

        <ul>


            <div class="relative overflow-x-auto">
                <table
                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border dark:bg-gray-800 dark:border-gray-700">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Foto
                            </th>
                            <th scope="col" class="px-5 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-5 py-3">
                                Nim
                            </th>
                            <th scope="col" class="px-5 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-5 py-3">
                                Nilai
                            </th>
                            <th scope="col" class="px-5 py-3">
                                Opsi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($tugas) && !$tugas->isEmpty())
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($tugas as $data)
                                @php
                                    $i++;
                                @endphp
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 font-bold">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $i }}
                                    </th>
                                    <td class="px-2 py-4">
                                        <img class="w-10 h-10 rounded-full"
                                            src="{{ isset($data->mahasiswa->foto) ? Storage::url($data->mahasiswa->foto) : asset('assets/img/user.png') }}"
                                            alt="Foto Mahasiswa">
                                    </td>
                                    <td class="px-6 py-4 text-xs md:text-sm">
                                        {{ $data->mahasiswa->nama }}
                                    </td>
                                    <td class="px-6 py-4 text-xs md:text-sm">
                                        {{ $data->mahasiswa->nim }}
                                    </td>
                                    <td class="px-6 py-4 text-xs md:text-sm">
                                        @if ($data->updated_at < $dueDate)
                                            <div class="flex items-center text-green-500">
                                                Tepat Waktu
                                            </div>
                                        @else
                                            <div class="flex items-center">
                                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2 text-xs md:text-sm">
                                                </div> Telat
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-xs md:text-sm">
                                        @php
                                            $jsonData = json_decode($data->nilai, true); // Decode JSON string into an associative array
                                            $nilaiValue = isset($jsonData[0]['nilai']) ? $jsonData[0]['nilai'] : 0; // Access the 'nilai' property or use 0 if it's null
                                        @endphp
                                        @if ($nilaiValue)
                                            {{ $nilaiValue }}
                                        @else
                                            Belum dinilai
                                        @endif

                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('nilai.show', ['id' => $data->id]) }}"
                                            class="font-medium text-gray-50 dark:text-gray-50 bg-blue-600 dark:bg-blue-700 px-5 py-1 rounded">Periksa</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                <td colspan="6" class="px-6 py-4 text-center">
                                    Belum ada data
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="text-white dark:bg-dark-600 mt-4 flex justify-end">
                <a class="d-flex p-2 rounded bg-green-500 text-sm" href="{{ route('tugas.show', ['tuga' => $tugass]) }}">
                    {{-- <i class="fas fa-check mx-2"></i> --}}
                    <span>Kembali</span>
                </a>

            </div>
        </ul>

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
                countdownElement.innerHTML = "Waktu pengumpulan telah habis!";
            }
        }

        setInterval(updateCountdown, 1000);
    </script>
@endsection
