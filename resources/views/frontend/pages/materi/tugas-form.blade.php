@extends('layouts.app')
@section('content')
    <div class="flex items-center">
        <div class="bg-blue-500 border dark:border-gray-800 rounded-md px-4 py-6 inline-flex items-center mr-2">
            <i class="fa-solid fa-file-arrow-up fa-lg text-white"></i>
        </div>
        <div>
            <h1 class="text-3xl font-bold pt-4 lg:pt-0 text-dark dark:text-white">Assignment</h1>
            <p class="text-xs dark:text-white">{{ $pertemuan->judul_pertemuan }}</p>
        </div>
    </div>
    <form action="{{ route('materi.storeTugas', ['id' => $pertemuan]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col mb-5">
            <div class="flex gap-4 mt-4">
                <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white w-24"><span>Judul</span></label>
                <div class="mb-6 w-full">
                    <input type="text" id="judul_tugas" name="Judul_tugas"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Judul Tugas" required>

                </div>
            </div>


            <div class="flex gap-4 mt-4">
                <label
                    class="block mb-2 text-sm font-medium text-blue-600 dark:text-white w-24"><span>Deskripsi</span></label>
                <div class="mb-2 w-full shadow">
                    <div
                        class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                        <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
                            <label for="editor" class="sr-only">Publish post</label>
                            <textarea id="editor" rows="8" name="Deskripsi"
                                class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                placeholder="Deskripsi tugas..." required></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex gap-4 mt-4">
                <label
                    class="block mb-2 text-sm font-medium text-blue-600 dark:text-white w-24"><span>Instruksi</span></label>
                <div class="mb-2 w-full shadow">
                    <div
                        class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                        <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
                            <label for="editor" class="sr-only">Publish post</label>
                            <textarea id="editor" rows="8" name="Instruksi"
                                class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                placeholder="Instruksi tugas..." required></textarea>
                        </div>
                    </div>
                </div>
            </div>




            <div class="flex gap-4 mt-4">
                <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white w-24"><span>Upload
                        File</span></label>
                <div class="mb-6 w-full">
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="file_input" type="file" name="Tugas_file" multiple>


                </div>
            </div>


            <div class="flex gap-4 mt-4">
                <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white w-24"><span>Waktu
                        Tenggat</span></label>
                <div class="mb-6 flex gap-2 justify-center items-center">

                    <div class="grow-1">
                        <input type="date"
                            class="bg-gray-50 grow-0 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            id="tanggal" name="Batas_tanggal">
                    </div>

                    <div class="grow-0">
                        <select id="Batas_jam" name="Jam"
                            class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php
                            // Menghasilkan pilihan jam dari 1 hingga 23 dengan dua digit
                            for ($jam = 0; $jam <= 23; $jam++) {
                                $formatted_jam = str_pad($jam, 2, '0', STR_PAD_LEFT);
                                echo "<option value=\"$formatted_jam\">$formatted_jam</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <p>:</p>
                    <div class="grow-0">
                        <select id="jam-keluar" name="Menit"
                            class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php
                            // Menghasilkan pilihan jam dari 1 hingga 23 dengan dua digit
                            for ($jam = 0; $jam <= 23; $jam++) {
                                $formatted_jam = str_pad($jam, 2, '0', STR_PAD_LEFT);
                                echo "<option value=\"$formatted_jam\">$formatted_jam</option>";
                            }
                            ?>
                        </select>
                    </div>

                </div>
            </div>
            <x-success-alert></x-success-alert>
            <x-error-alert></x-error-alert>
            <div class="flex gap-2">
                <div class="w-24"></div>
                <div class="button">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>

                    <a class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        href="{{ route('pertemuan.show', ['pertemuan' => $pertemuan]) }}}">Kembali</a>
                </div>
            </div>

        </div>

    </form>





    <script src="{{ asset('js/video.js') }}"></script>
@endsection
