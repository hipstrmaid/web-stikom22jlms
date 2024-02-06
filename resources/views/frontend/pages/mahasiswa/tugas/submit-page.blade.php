@extends('layouts.app')
@section('content')
    <div class="flex w-full justify-between items-center">
        <h1 class="text-4xl mb-5 font-bold pt-4 lg:pt-0 text-dark dark:text-white">Submit Tugas</h1>
    </div>

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
            <li class="w-full px-4 py-2 border-y dark:border-gray-600">{{ $submitted }} /
                {{ $enrolled->count() }} </li>
            <div class="w-full px-4 py-2 dark:border-gray-600" id="countdown"></div>
        </div>
    </ul>

    <form action="{{ route('submission.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col mb-5">
            <div class="flex gap-4 mt-4">
                <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white w-24"><span>File
                        Tugas</span></label>
                <div class="mb-6 w-full">
                    <input
                        class="block w-full text-xs text-gray-900 border border-gray-300 cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="file_input" type="file" name="file">
                </div>
            </div>
            @if (session('error'))
                <div id="alert"
                    class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-gray-400"
                    role="alert">
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            @endif

            <div class="flex gap-2">
                <div class="w-24"></div>
                <div class="button flex gap-2">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white text-xs font-bold py-1 px-4 rounded w-full">
                        Submit
                    </button>

                    <a class="text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded text-xs w-full sm:w-auto px-4 py-1 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800"
                        href="#">Batal</a>
                </div>

            </div>

        </div>
        <input type="hidden" name="idTugas" value="{{ $idTugas }}">
    </form>






    <script src="{{ asset('js/video.js') }}"></script>
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
