@extends('layouts.app')
@section('content')
    <h1 class="mb-1 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">
        {{ $matkul->nama_matkul }}</h1>
    {{ Breadcrumbs::render('createPertemuan', $matkul_id) }}


    <div class="grid grid-cols-1 mb-5 mt-2">
        <ul class="flex bg-gray-200 dark:bg-gray-900">
            <div class="bg-white border border-gray-200 border-b-0 rounded-t dark:border-gray-900 dark:bg-gray-800">
                <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold">
                    <i class="fas fa-archive"></i>
                    Tambah Pertemuan
                </h5>
            </div>
        </ul>



        <div class="bg-white text-sm border border-gray-200 border-t-0 dark:border-gray-900 dark:bg-gray-800">
            <ul class="grid w-full gap-2 mb-4 p-5">
                <li>
                    <form action="{{ route('pertemuan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white"><span>Judul
                                    pertemuan</span></label>
                            <input type="text" id="email" name="Judul_pertemuan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="cth. Pengenalan Adobe Photoshop" required>
                        </div>

                        <div class="mb-6">

                            <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Instruksi
                                untuk Mahasiswa</label>
                            <textarea id="message" rows="4" name="instruksi"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="cth. Nonton video di sebelah lalu kerjakan tugas tertera..."></textarea>

                        </div>

                        <x-success-alert></x-success-alert>

                        <input type="text" id="email" name="id_matkul" value="{{ $matkul_id }}" hidden>
                        <div class="flex gap-2">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>

                            <a class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                href="{{ route('matkul.pertemuanPreview', ['id' => $matkul->id]) }}">Kembali</a>
                        </div>
                    </form>

                </li>

            </ul>

        </div>


    </div>
@endsection
