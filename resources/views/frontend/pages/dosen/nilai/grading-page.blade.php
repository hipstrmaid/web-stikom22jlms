@extends('layouts.app')
@section('content')
    <article class="bg-gray-50 dark:bg-gray-800 h-full">
        <form action="{{ route('nilai.store', ['id' => $pengumpulan->id]) }}" method="POST">
            @csrf
            <div class="px-5 py-3">
                <div class="flex gap-4">
                    {{-- <div class="flex gap-2 items-center">
                    <div>
                        <p class="font-bold text-lg dark:text-white">{{ $pengumpulan->tugas->judul_tugas }}</p>
                        <p class="font-bold text-lg dark:text-white">
                            {{ Helper::Cparse($pengumpulan->tugas->tgl_tenggat)->format('d F Y') }}
                    </div>
                </div> --}}
                    <div class="flex gap-2 items-center">
                        <div class="border border-gray-200">
                            <img class="w-12 h-12"
                                src="{{ isset($pengumpulan->mahasiswa->foto) ? Storage::url($pengumpulan->mahasiswa->foto) : asset('assets/img/user.png') }}"
                                alt="User Photo">

                        </div>
                        <div>
                            <p class="font-bold text-lg dark:text-white">{{ $pengumpulan->mahasiswa->nama }}</p>
                            <p class="font-bold text-lg dark:text-white">{{ $pengumpulan->mahasiswa->nim }}</p>

                        </div>
                    </div>
                </div>
            </div>
            <hr class="w-full h-1 bg-gray-200 rounded dark:bg-gray-700">

            <div class="px-5">


                <p class="mt-5 ml-1 font-bold dark:text-white">Submission Detail</p>
                <ul
                    class="flex mb-5 text-xs md:text-sm font-medium text-gray-900 bg-white border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <div class="w-32">
                        <li class="w-full pl-2 py-2 font-bold border-b dark:border-gray-600">Mata Kuliah</li>
                        <li class="w-full pl-2 py-2 font-bold dark:border-gray-600">Pertemuan</li>
                    </div>
                    <div class="w-full">
                        <li class="border-l border-b w-full px-4 py-2 items-center dark:border-gray-600">
                            {{ $pengumpulan->tugas->pertemuan->matkul->nama_matkul }}
                        </li>
                        <li class="border-l w-full px-4 py-2 items-center dark:border-gray-600">
                            {{ $pengumpulan->tugas->pertemuan->judul_pertemuan }}
                        </li>
                    </div>
                </ul>


                <p class="mt-5 ml-1 font-bold dark:text-white">Submission Status</p>
                <ul
                    class="flex mb-5 text-xs md:text-sm font-medium text-gray-900 bg-white border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <div class="w-32">
                        <li class="w-full pl-2 py-2 font-bold border-b dark:border-gray-600">Status</li>
                        <li class="w-full pl-2 py-2 font-bold border-b dark:border-gray-600">File</li>
                        <li class="w-full pl-2 py-2 font-bold dark:border-gray-600">Nilai</li>
                    </div>
                    <div class="w-full">

                        <li
                            class=" border-l border-b w-full px-4 py-2 {{ $pengumpulan->updated_at < $dueDate ? 'text-green-500' : 'text-red-500' }} font-bold border-gray-200 dark:border-gray-600">
                            {{ $pengumpulan->updated_at < $dueDate ? 'Tepat Waktu' : 'Telat' }}</li>
                        <li class="border-l border-b w-full px-4 py-2 items-center dark:border-gray-600">
                            <i class="fas fa-file mr-1"></i>
                            <a href="{{ Storage::url($file->path_file) }}">
                                <span
                                    class="text-xs font-bold text-blue-600 hover:underline ">{{ str_replace('public/submission/files/', '', $file->path_file) }}
                                </span>
                            </a>
                        </li>
                        <li class="border-l px-4 py-1 dark:border-gray-600 flex items-center">
                            <input type="number" name="nilai"
                                class="w-16 bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                min="0" max="100" required>

                            <p class="ml-2">/100</p>
                        </li>
                    </div>
                </ul>
            </div>


            <div class="text-white dark:bg-dark-600 mt-4 flex gap-2 justify-center">
                <button type="submit" class="d-flex p-2 rounded bg-blue-500 text-sm">
                    {{-- <i class="fas fa-check mx-2"></i> --}}
                    <span>Simpan</span>
                </button>

                <a class="d-flex p-2 rounded bg-green-500 text-sm"
                    href="{{ route('submission.indexAll', ['id' => $pengumpulan->tugas]) }}">
                    {{-- <i class="fas fa-check mx-2"></i> --}}
                    <span>Kembali</span>
                </a>

            </div>
        </form>
    </article>
@endsection
