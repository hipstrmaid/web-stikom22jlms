@extends('layouts.app')
@section('content')
    <div class="flex w-full justify-between items-center">
        <h1 class="text-4xl font-bold pt-4 lg:pt-0 text-dark dark:text-white">Tambah File</h1>
    </div>
    <form action="{{ route('materi.storeFile', ['id' => $pertemuan]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col mb-5">


            <div class="flex gap-4 mt-4">
                <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white w-24"><span>Nama
                        File</span></label>
                <div class="mb-6 w-full">
                    <input type="text" id="nama_file" name="nama_file"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Nama file" required>

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
                            <textarea id="editor" rows="8" name="deskripsi"
                                class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                placeholder="Deskripsi file..." required></textarea>
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
                        aria-describedby="file_input_help" id="file_input" type="file" name="file">
                </div>
            </div>
            @if (session('success'))
                <div id="alert"
                    class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif
            @if (session('error'))
                <div id="alert"
                    class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            @endif

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
