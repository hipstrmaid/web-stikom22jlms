@extends('layouts.app')
@section('content')
    <div class="row flex flex-col">



        <div class="bg-white text-sm rounded-t dark:border-gray-900 dark:bg-gray-800">
            <div class="w-full panel-head flex items-center p-4">

                <div class="flex flex-col w-full  dark:text-gray-50 dark:text-gray-400">
                    <h1 class="text-2xl font-bold">Tabel Role</h1>
                </div>
                <button class="flex items-center p-2 dark:text-gray-50 hover:bg-gray-100 dark:hover:bg-gray-600">
                    <div class="row">
                        <div class="w-full flex justify-content-end">
                            @component('components.modal-toggle')
                                <i class="fa-solid fa-plus"></i><span>Role</span>
                            @endcomponent
                            @component('components.modal')
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambah Role</h3>
                                    <form class="space-y-6" action="{{ route('role.store') }}" method="POST">
                                        @csrf
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                Role</label>
                                            <input type="text" name="nama_role"
                                                class="@error('role') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                required>
                                        </div>



                                        <button type="submit"
                                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Daftarkan</button>
                                    </form>
                                </div>
                            @endcomponent
                        </div>
                    </div>
                </button>
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
                                NAMA
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal dibuat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($roles as $role)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $role->id }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $role->nama_role }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $role->created_at }}
                                </td>

                                <td class="px-2 py-4 text-left flex gap-2">
                                    <!-- Form for updating a Role -->
                                    <form class="space-y-6" action="{{ route('role.update', $role->id) }}" method="POST">
                                        <button data-modal-target="authentication-modal-1"
                                            data-modal-toggle="authentication-modal"
                                            class="font-medium text-white dark:text-blue-500 hover:underline bg-blue-400 p-2 rounded">Edit</button>
                                        @csrf
                                        @method('PUT')
                                        @component('components.edit.modal')
                                            <div class="px-6 py-6 lg:px-8">
                                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambah Role
                                                </h3>
                                                <div>
                                                    <label
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                        Role</label>
                                                    <input type="text" name="nama_role" value="{{ $role->nama_role }}"
                                                        class="@error('role') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                                </div>

                                                <button type="submit"
                                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Daftarkan</button>

                                            </div>
                                        @endcomponent
                                    </form>







                                    <form action="{{ route('role.destroy', ['role' => $role->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="font-medium text-white dark:text-blue-500 hover:underline bg-red-400 p-2 rounded">Hapus</button>
                                    </form>

                                </td>
                        @endforeach
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
