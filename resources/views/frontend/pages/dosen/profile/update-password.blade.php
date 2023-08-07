@extends('layouts.app')
@section('content')
    <x-content-title>Update Profile</x-content-title>
    <x-breadcrumbs></x-breadcrumbs>
    <div class="row">
        <div class="grid grid-cols-1 mb-5">
            <ul class="flex bg-gray-200 dark:bg-gray-900">
                {{-- <div class="border border-gray-200 border-b-0 rounded-t dark:border-gray-900">
                    <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold"><a
                            href="{{ route('dosen.show', ['dosen' => Auth::user()->dosen->id]) }}">Profil</a>
                    </h5>
                </div>
                <div class="border  border-gray-200 border-b-0 rounded-t dark:border-gray-900">
                    <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold"><a
                            href="{{ route('dosen.edit', ['dosen' => Auth::user()->dosen->id]) }}">Edit Profile</a>
                    </h5>
                </div> --}}
                <div class="border bg-white border-gray-200 border-b-0 rounded-t dark:border-gray-900 dark:bg-gray-800">
                    <h5 class="text-sm  text-gray-900 dark:text-white py-2 px-4 font-bold"><a
                            href="{{ route('user.editPassword', ['user' => Auth::user()->id]) }}">Update Password</a>
                    </h5>
                </div>
            </ul>
            {{-- {{ print_r($errors->all()) }} --}}
            <div class="bg-white text-sm border border-gray-200 border-t-0 dark:border-gray-900 dark:bg-gray-800">
                <ul class="grid w-full gap-2 mb-4 p-5">
                    <form action="{{ route('user.updatePassword', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 xl:grid-cols-5 gap-2 xl:gap-4">
                            <div class="col-span-1 xl:col-span-1">
                                <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Password</label>
                            </div>
                            <div class="col-span-1 xl:col-span-4">
                                <input type="password" id="password" name="current_password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('current_password')
                                    <p class="text-red-600"> {{ $message }}</p>
                                @enderror
                            </div>


                            <div class="col-span-1 xl:col-span-1">
                                <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Password
                                    baru</label>
                            </div>
                            <div class="col-span-1 xl:col-span-4">
                                <input type="password" id="password" name="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('password')
                                    <p class="text-red-600"> {{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        @if (session('success'))
                            <div class="p-4 mb-4 mt-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                                role="alert">
                                <span class="font-medium">Berhasil!</span> Password berhasil di ubah.
                            </div>
                        @endif
                        <button type="submit"
                            class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    </form>

                </ul>

            </div>


        </div>


    </div>
@endsection
