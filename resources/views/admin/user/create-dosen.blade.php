@extends('layouts.app')
@section('content')
    <div class="row flex flex-col">
        @if (Session::has('success'))
            <x-user-create-success>
                <div class="ml-3 text-sm font-normal">Akun Berhasil dibuat.</div>
            </x-user-create-success>
        @endif
        @error('nim')
            <x-user-create-warning>
                <div class="ml-3 text-sm font-normal">{{ $message }}</div>
            </x-user-create-warning>
        @enderror
        <div class="text-sm rounded-t dark:border-gray-900 ">


            <div class="w-full bg-white dark:bg-gray-800 panel-head flex items-center p-2">
                <div class="flex flex-col w-full  dark:text-gray-50 dark:text-gray-400">
                    <h1 class="text-2xl font-bold">Tabel BAAK</h1>
                </div>
                <div class="flex items-center p-2 dark:text-gray-50">
                    <div class="row">
                        <div class="w-full flex justify-content-end">
                            <!-- Modal Tekom toggle -->
                            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                                class="block flex  items-center gap-1 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded    text-sm px-2 py-1.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                type="button">
                                <i class="fa-solid fa-plus"></i><span>Dosen</span>
                            </button>
                            <!-- Main Tekom modal -->
                            <div id="authentication-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button title="Toggleclosemodal" type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                            data-modal-hide="authentication-modal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="px-6 py-6 lg:px-8">
                                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambah akun
                                                Dosen/BAAK

                                            </h3>
                                            <form class="space-y-6" action="{{ route('user.store') }}" method="POST">
                                                @csrf
                                                <div>
                                                    <label for="nim"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIDN</label>
                                                    <input type="text" name="nim" id="nim"
                                                        class="@error('nim') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                        placeholder="cth. 1920557xx" required>
                                                    <label for="role"
                                                        class="block py-4 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                                                    <select id="role" name="role_id"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option selected value="2">Dosen</option>
                                                        <option value="3">BAAK</option>
                                                    </select>
                                                </div>
                                                <button type="submit"
                                                    class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Daftarkan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <hr class="bg-gray-200 h-0.5 border-0 dark:bg-gray-700">
            <div class="relative overflow-x-auto shadow-md">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                FOTO
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NIDN
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NAMA
                            </th>
                            <th scope="col" class="px-6 py-3">
                                AKSI
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $index = 1;
                        @endphp
                        @foreach ($users->where('role_id', 3) as $user)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $index++ }}
                                </td>
                                <td class="px-6 py-4">
                                    @isset($user->dosen->foto)
                                        <img src="{{ Storage::url($user->dosen->foto) }}"
                                            class="rounded-full w-8 h-8 object-cover" alt="foto-user">
                                    @else
                                        <img src="{{ asset('assets/img/user.webp') }}" class="rounded-full w-8 h-8"
                                            alt="foto-user">
                                    @endisset

                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->dosen->nidn }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $user->dosen->nama }}
                                </td>
                                <td class="px-6 py-4 text-left">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="w-full bg-white dark:bg-gray-800 panel-head flex items-center p-4 mt-2">
                <div class="flex flex-col w-full  dark:text-gray-50 dark:text-gray-400">
                    <h1 class="text-2xl font-bold">Tabel Dosen</h1>
                </div>
            </div>

            <hr class="bg-gray-200 h-0.5 border-0 dark:bg-gray-700">
            <div class="relative overflow-x-auto shadow-md">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                FOTO
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NIDN
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NAMA
                            </th>
                            <th scope="col" class="px-6 py-3">
                                AKSI
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $index = 1;
                        @endphp
                        @foreach ($users->where('role_id', 2) as $user)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $index++ }}
                                </td>
                                <td class="px-6 py-4">
                                    @isset($user->dosen->foto)
                                        <img src="{{ Storage::url($user->dosen->foto) }}"
                                            class="rounded-full w-8 h-8 object-cover" alt="foto-user">
                                    @else
                                        <img src="{{ asset('assets/img/user.webp') }}" class="rounded-full w-8 h-8"
                                            alt="foto-user">
                                    @endisset

                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->dosen->nidn }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $user->dosen->nama }}
                                </td>
                                <td class="px-6 py-4 text-left">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
@endsection
