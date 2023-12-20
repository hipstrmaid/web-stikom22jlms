@extends('layouts.app')
@section('content')
    <x-content-title>Edit Profile</x-content-title>
    {{ Breadcrumbs::render('mahasiswaView') }}
    <div class="row">
        <div class="grid grid-cols-1 mb-5">
            <ul class="flex bg-gray-200 dark:bg-gray-900">
                <div class="bg-white border border-gray-200 border-b-0 rounded-t dark:border-gray-900 dark:bg-gray-800">
                    <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold"><a
                            href="{{ route('mahasiswa.show', ['mahasiswa' => $mahasiswa->id]) }}"><i
                                class="fas fa-user mr-2"></i>Profil</a>
                    </h5>
                </div>
                <div>
                    <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold"><a
                            href="{{ route('mahasiswa.edit', ['mahasiswa' => $mahasiswa->id]) }}"><i
                                class="fas fa-credit-card mr-2"></i>Edit Profile</a>
                    </h5>
                </div>
            </ul>


            <div class="bg-white text-sm border border-gray-200 border-t-0 dark:border-gray-900 dark:bg-gray-800">
                <div class="px-4 flex items-center justify-center">
                    <div class="relative flex-col min-w-0 break-words bg-white mb-6 rounded-lg mt-5">
                        <div class="grid grid-sm-8 px-6 dark:bg-gray-800 dark:text-white flex items-center">
                            <div class="flex flex-wrap justify-center col-span-6 ">
                                <div class="w-full px-4">
                                    <div class="py-5 px-5 flex items-center justify-center">
                                        <div class="img-profile shadow-lg">
                                            @isset($mahasiswa->foto)
                                                <img src="{{ Storage::url($mahasiswa->foto) }}" alt="Dosen Foto">
                                            @else
                                                <img src="{{ asset('assets/img/user.png') }}" alt="Default Foto">
                                            @endisset
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-2 pb-4 col-span-6">
                                <h3 class="text-2xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
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
                                <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                                    {{ $mahasiswa->semester->nama_semester ?? 'Semester 1' }}
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
@endsection
