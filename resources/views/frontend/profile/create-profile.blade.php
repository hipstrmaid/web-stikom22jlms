@extends('layouts.app')
@section('content')
    <x-content-title>Edit Profile</x-content-title>
    <x-breadcrumbs></x-breadcrumbs>
    <div class="row">
        <div class="grid grid-cols-1 mb-5">
            <ul class="flex bg-gray-200 dark:bg-gray-900">
                <div class="dark:border-gray-900 dark:bg-gray-900">
                    <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold"><a
                            href="{{ route('mahasiswa.viewProfile', Auth::id()) }}">Profile</a></h5>
                </div>
                <div class="bg-white border border-gray-200 border-b-0 rounded-t dark:border-gray-900 dark:bg-gray-800">
                    <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold"><a
                            href="/matkul/edit-pertemuan">Edit Profile</a></h5>
                </div>

            </ul>

            <div class="bg-white text-sm border border-gray-200 border-t-0 dark:border-gray-900 dark:bg-gray-800">
                <ul class="grid w-full gap-2 mb-4 p-5">
                    <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6 gap-4">
                            <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white"><span>Nama</label>
                            <input type="text" id="nama" name="nama" value="{{ $edit->nama }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="mb-6">

                            <img class="h-auto max-w-lg rounded-lg" src="{{ $edit->foto }}" alt="image description">

                        </div>

                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Foto</label>
                            <input name="foto" value=""
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" id="file_input" type="file">

                        </div>
                        <label for="semester" class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Program
                            Studi</label>
                        <select id="prodi" name="prodi_id"
                            class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih Prodi</option>
                            <option value="1">Sistem Informasi</option>
                            <option value="2">Teknik Komputer</option>
                        </select>
                        <input type="text" value="1" name="user_id" hidden>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    </form>

                </ul>

            </div>


        </div>


    </div>
@endsection
