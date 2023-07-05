@extends('layouts.app')
@section('content')
    <div class="content-head flex justify-between">
        <x-content-title>{{ auth()->user()->mahasiswa->nama ?? 'Mata Kuliah Saya' }}</x-content-title>
        @if (auth()->check() && auth()->user()->role_id == 2)
            <a href="{{ route('matkul.create') }}"><button type="button"
                    class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"><i
                        class="fa-solid fa-plus"></i> Tambah</button></a>
        @endif
    </div>

    <x-breadcrumbs></x-breadcrumbs>

    <div class="row">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4 h-46 mb-4">
            @foreach ($matkuls as $matkul)
                <div
                    class="max-w-lg bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg" src="{{ Storage::url($matkul->gambar) }}" alt="" />
                    </a>
                    <div class="p-5">
                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $matkul->hari }}</span>
                        <a href="{{ route('matkul.show', ['matkul' => $matkul->id]) }}">
                            <h5 class="my-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $matkul->nama_matkul }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $matkul->deskripsi }}</p>


                        <div class="w-full bg-gray-200 rounded-full h-2.5 mb-2.5 dark:bg-gray-700">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
                        </div>
                        <div class="panel-footer">


                            <button
                                class="w-full px-3 py-2 text-sm font-medium text-white bg-green-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-green-800 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                <a href="/matkul/pertemuan" class="inline-flex  items-center"><i
                                        class="fa-solid fa-pen-to-square mr-2"></i> Edit Mata Kuliah
                                </a>
                            </button>
                            @if (auth()->check() && auth()->user()->role_id == 1)
                                <button
                                    class="w-full px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <a href="/matkul/pertemuan/belajar" class=" inline-flex items-center">
                                        Belajar
                                    </a>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach





        </div>
    </div>
@endsection
