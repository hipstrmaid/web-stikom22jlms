@extends('layouts.app')
@section('content')
    <x-content-title>Update Profile</x-content-title>
    <x-breadcrumbs></x-breadcrumbs>
    <div class="row">
        <div class="grid grid-cols-1 mb-5">
            <ul class="flex bg-gray-200 dark:bg-gray-900">
                {{-- <div class="border border-gray-200 border-b-0 rounded-t dark:border-gray-900">
                    <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold"><a
                            href="{{ route('dosen.show', ['dosen' => $dosen->id]) }}">Profil</a>
                    </h5>
                </div>
                <div class="border  border-gray-200 border-b-0 rounded-t dark:border-gray-900 dark:bg-gray-800">
                    <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold"><a
                            href="{{ route('dosen.edit', ['dosen' => $dosen->id]) }}">Edit Profile</a>
                    </h5>
                </div> --}}
                <div class="border border-gray-200 border-b-0 rounded-t dark:border-gray-900 dark:bg-gray-800">
                    <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold"><a
                            href="{{ route('dosens.editPassword', ['user' => $user->id]) }}">Update Password</a>
                    </h5>
                </div>
            </ul>

            <div class="bg-white text-sm border border-gray-200 border-t-0 dark:border-gray-900 dark:bg-gray-800">
                <ul class="grid w-full gap-2 mb-4 p-5">
                    <form action="{{ route('dosens.updatePassword', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 xl:grid-cols-5 gap-2 xl:gap-4">

                            <div class="col-span-1 xl:col-span-1">
                                <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Password</label>
                            </div>
                            <div class="col-span-1 xl:col-span-4">
                                <input type="text" id="password" name="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </div>

                        <button type="submit"
                            class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    </form>

                </ul>

            </div>


        </div>


    </div>
@endsection
