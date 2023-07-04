@extends('layouts.app')
@section('content')
    <x-content-title>Edit Profile</x-content-title>
    <x-breadcrumbs></x-breadcrumbs>
    <div class="row">
        <div class="grid grid-cols-1 mb-5">
            <ul class="flex bg-gray-200 dark:bg-gray-900">
                <div class="bg-white border border-gray-200 border-b-0 rounded-t dark:border-gray-900 dark:bg-gray-800">
                    <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold"><a
                            href="{{ route('dosen.viewProfile', Auth::id()) }}">Profil</a>
                    </h5>
                </div>
                <div class="border border-gray-200 border-b-0 rounded-t dark:border-gray-900 dark:bg-gray-800">
                    <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold"><a
                            href="{{ route('dosen.editProfile', Auth::id()) }}">Edit Profile</a>
                    </h5>
                </div>
            </ul>

            <section class="bg-blueGray-50">
                <div class="w-full lg:w-4/12 px-4 mx-auto">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-16">
                        <div class="px-6">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full px-4 flex justify-center">
                                    <div class="py-5 px-5">
                                        <div class="img-profile">
                                            <img src="{{ Storage::url($dosen->foto) }}" alt="Dosen Foto">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-2 pb-4">
                                <h3 class="text-xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                                    {{ $dosen->nama }}
                                </h3>
                                <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">

                                    {{ $dosen->user->nim_mhs }}
                                </div>
                                <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                                    {{ $dosen->user->role->nama_role }}
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </section>


        </div>


    </div>
@endsection
