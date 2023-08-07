@extends('layouts.app')
@section('content')
    <x-content-title>Edit Profile</x-content-title>
    <x-breadcrumbs></x-breadcrumbs>
    <div class="row">
        <div class="grid grid-cols-1 mb-5">
            <ul class="flex bg-gray-200 dark:bg-gray-900">
                <div class="bg-white border border-gray-200 border-b-0 rounded-t dark:border-gray-900 dark:bg-gray-800">
                    <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold"><a
                            href="{{ route('mahasiswa.show', ['mahasiswa' => $mahasiswa->id]) }}">Profil</a>
                    </h5>
                </div>
                <div class="border border-gray-200 border-b-0 rounded-t dark:border-gray-900">
                    <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold"><a
                            href="{{ route('mahasiswa.edit', ['mahasiswa' => $mahasiswa->id]) }}">Edit Profile</a>
                    </h5>
                </div>
            </ul>


            <div class="bg-white text-sm border border-gray-200 border-t-0 dark:border-gray-900 dark:bg-gray-800">
                <div class="w-full px-4">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-5">
                        <div class="px-6 dark:bg-gray-900 dark:text-white flex items-center">
                            <div class="flex flex-wrap justify-center ">
                                <div class="w-full px-4">
                                    <div class="py-5 px-5">
                                        <div class="img-profile">
                                            @isset($mahasiswa->foto)
                                                <img src="{{ Storage::url($mahasiswa->foto) }}" alt="Dosen Foto">
                                            @else
                                                <img src="{{ asset('assets/img/user.png') }}" alt="Default Foto">
                                            @endisset
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="text-left mt-2 pb-4">
                                <h3 class="text-xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                                    {{ $mahasiswa->nama ?? 'Nama' }}
                                </h3>
                                <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                                    {{ $mahasiswa->user->role->nama_role ?? 'Role' }}
                                </div>
                                <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                                    {{ $mahasiswa->nim ?? 'Nim/Nidn' }}
                                </div>
                                <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                                    {{ $mahasiswa->prodi->nama_prodi ?? 'Nim/Nidn' }}
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
@endsection
