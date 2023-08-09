@extends('layouts.app')
@section('content')
    <x-content-title>Edit Profile</x-content-title>
    {{ Breadcrumbs::render('dosenView') }}
    <div class="row">
        <div class="grid grid-cols-1 mb-5">
            <ul class="flex bg-gray-200 dark:bg-gray-900">
                <div class="bg-white border border-gray-200 border-b-0 rounded-t dark:border-gray-900 dark:bg-gray-800">
                    <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold"><a
                            href="{{ route('dosen.show', ['dosen' => $dosen->id]) }}">Profil</a>
                    </h5>
                </div>
                <div class="">
                    <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold"><a
                            href="{{ route('dosen.edit', ['dosen' => $dosen->id]) }}">Edit Profile</a>
                    </h5>
                </div>
            </ul>


            <div class="bg-white text-sm border border-gray-200 border-t-0 dark:border-gray-900 dark:bg-gray-800">
                <div class="w-full px-4">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 rounded-lg mt-5">
                        <div class="px-6 dark:bg-gray-800 dark:text-white flex items-center">
                            <div class="flex flex-wrap justify-center ">
                                <div class="w-full px-4">
                                    <div class="py-5 px-5">
                                        <div class="img-profile">
                                            @isset($dosen->foto)
                                                <img src="{{ Storage::url($dosen->foto) }}" alt="Dosen Foto">
                                            @else
                                                <img src="{{ asset('assets/img/user.png') }}" alt="Default Foto">
                                            @endisset
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="text-left mt-2 pb-4">
                                <h3 class="text-2xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                                    {{ $dosen->nama ?? 'Nama' }}
                                </h3>
                                <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                                    {{ $dosen->nidn ?? 'Nim/Nidn' }}
                                </div>
                                <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                                    {{ $dosen->user->role->nama_role ?? 'Role' }}
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
@endsection
