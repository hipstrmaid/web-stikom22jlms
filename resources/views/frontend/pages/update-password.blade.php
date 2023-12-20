@extends('layouts.app')
@section('content')
    <x-content-title>Ganti Password</x-content-title>
    {{ Breadcrumbs::render('ubahPassword') }}


    <div class="row">
        <div class="grid grid-cols-1 mb-5">
            <ul class="flex bg-gray-200 dark:bg-gray-900">
                <div class="border bg-white border-gray-200 border-b-0 rounded-t dark:border-gray-900 dark:bg-gray-800">
                    <h5 class="text-sm  text-gray-900 dark:text-white py-2 px-4 font-bold">Ubah Password
                    </h5>
                </div>
            </ul>
            {{-- {{ print_r($errors->all()) }} --}}
            <div class="bg-white text-sm border border-gray-200 border-t-0 dark:border-gray-900 dark:bg-gray-800">
                <ul class="grid w-full gap-2 mb-4 p-5">
                    <form action="{{ route('user.updatePassword', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 xl:grid-cols-8 gap-4 xl:gap-4 p-3 ">

                            <div class="col-span-1 xl:col-span-1">
                                <label
                                    class="block text-sm font-medium text-blue-600 dark:text-white xl:text-right hidden md:block">Email</label>
                            </div>

                            <div class="col-span-1 xl:col-span-7 relative z-0 w-full group ">
                                <input type="text" id="username" disabled value="{{ old('nama', $user->username) }}"
                                    class="block py-2.5 px-0 w-full font-bold text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="username"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
                            </div>

                            <div class="col-span-1">
                                <label
                                    class="block text-sm font-medium text-blue-600 dark:text-white xl:text-right">Password</label>
                            </div>

                            <div class="col-span-1 xl:col-span-7 relative z-0 w-full group ">
                                <input type="password" id="current_password" name="current_password"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="current_password"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password
                                    *</label>
                                @error('current_password')
                                    <p class="text-red-600"> {{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-1">
                                <label
                                    class="block text-sm font-medium text-blue-600 dark:text-white xl:text-right">Password
                                    baru*</label>
                            </div>

                            <div class="col-span-1 xl:col-span-7 relative z-0 w-full group ">
                                <input type="password" id="password" name="password"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="password"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password
                                    baru *</label>

                                @error('password')
                                    <p class="text-red-600"> {{ Str::ucfirst($message) }}</p>
                                @enderror
                                @if (session('success'))
                                    <div class="w-full p-4 mb-4 mt-4 text-sm text-green-900 rounded-lg bg-green-100 dark:bg-green-800 dark:text-green-400"
                                        role="alert">
                                        <span class="font-medium">Berhasil!</span> Password berhasil di ubah.
                                    </div>
                                @endif
                                <input type="text" name="Status_akun" value="Aktif" hidden>
                            </div>
                            <div class="col-span-1 xl:col-span-1">
                                <label class="block"></label>
                            </div>
                            <div class="col-span-1 xl:col-span-7">
                                <button type="submit"
                                    class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                            </div>
                        </div>



                    </form>

                </ul>

            </div>


        </div>


    </div>
@endsection
