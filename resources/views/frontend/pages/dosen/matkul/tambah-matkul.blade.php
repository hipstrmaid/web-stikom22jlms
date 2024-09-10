@extends('layouts.app')
@section('content')
    <h1 class="mb-1 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">
        Tambah Mata Kuliah</h1>
    {{ Breadcrumbs::render('tambahMatkul') }}

    <div>
        <ul class="flex bg-gray-200 dark:bg-gray-900" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
            <li class="" role="presentation">
                <button
                    class="tab-button bg-white dark:bg-gray-800 inline-flex font-bold text-sm h-full items-center gap-4 px-3 py-2 border border-gray-200 border-b-0 rounded-t dark:border-gray-900"
                    id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                    aria-selected="false"><i class="fa-solid fa-lock"></i> Mata Kuliah</button>
            </li>
            <li class="" role="presentation">
                <button
                    class="tab-button inline-flex font-bold text-sm h-full items-center gap-4 px-3 py-2 border border-gray-200 border-b-0 rounded-t dark:border-gray-900"
                    id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard"
                    aria-selected="false"><i class="fa-solid fa-credit-card"></i> Meta Data</button>
            </li>
        </ul>
    </div>

    <div id="myTabContent" class=" mb-5">
        <form action="{{ route('matkul.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="hidden bg-white p-4 text-sm border border-gray-200 border-t-0 dark:border-gray-900 dark:bg-gray-800"
                id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Judul</label>
                    <input type="text" id="email" name="nama_matkul" value="{{ old('nama_matkul') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="cth. Pemrograman Database II" required>
                </div>

                <div class="mb-6">

                    <label for="message"
                        class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Deskripsi</label>
                    <textarea id="message" rows="4" name="deskripsi" maxlength="254"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50  border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Sedikit deskripsi tentang mata kuliah ini (Min 100 huruf)...">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-500 text-md">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white"
                        for="file_input">Thumbnail</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300  cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="file_input" type="file" name="File"
                        value="{{ old('File') }}">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG.</p>
                    @if ($errors->has('File'))
                        <div class="p-4 mb-4 text-sm text-red-800  bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <span class="font-medium"> {{ $errors->first('File') }}</span>
                        </div>
                    @endif
                </div>

            </div>
            <div class="hidden bg-white p-2 text-sm border border-gray-200 border-t-0 dark:border-gray-900 dark:bg-gray-800"
                id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">

                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label for="hari"
                            class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Hari</label>
                        <select id="hari" name="hari"
                            class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Pilih hari</option>
                            <option value="Senin" {{ old('hari') == 'Senin' ? 'selected' : '' }}>Senin</option>
                            <option value="Selasa" {{ old('hari') == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                            <option value="Rabu" {{ old('hari') == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                            <option value="Kamis" {{ old('hari') == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                            <option value="Jumat" {{ old('hari') == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                            <option value="Sabtu" {{ old('hari') == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                        </select>

                    </div>
                    <div>
                        <label for="semester"
                            class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Semester</label>
                        <select id="semester" name="semester_id"
                            class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300  bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Pilih Semester</option>
                            <option value="1" {{ old('semester_id') == '1' ? 'selected' : '' }}>Semester 1</option>
                            <option value="2" {{ old('semester_id') == '2' ? 'selected' : '' }}>Semester 2</option>
                            <option value="3" {{ old('semester_id') == '3' ? 'selected' : '' }}>Semester 3</option>
                            <option value="4" {{ old('semester_id') == '4' ? 'selected' : '' }}>Semester 4</option>
                            <option value="5" {{ old('semester_id') == '5' ? 'selected' : '' }}>Semester 5</option>
                            <option value="6" {{ old('semester_id') == '6' ? 'selected' : '' }}>Semester 6</option>
                            <option value="7" {{ old('semester_id') == '7' ? 'selected' : '' }}>Semester 7</option>
                            <option value="8" {{ old('semester_id') == '8' ? 'selected' : '' }}>Semester 8</option>
                        </select>

                    </div>

                    <div class="flex gap-4">
                        <div>
                            <label for="jam" class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Jam
                                mulai</label>
                            <input type="text" id="jam" name="jam_mulai" maxlength="5"
                                value="{{ old('jam_mulai') }}"
                                class=" border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white" required
                                placeholder="cth: 14:20">
                        </div>
                        <div>
                            <label for="jam" class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Jam
                                Selesai</label>
                            <input type="text" id="jam" name="jam_selesai" maxlength="5"
                                value="{{ old('jam_selesai') }}"
                                class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white" required
                                placeholder="cth: 14:20">
                        </div>
                    </div>
                    <div>
                        <label for="prodi"
                            class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Prodi</label>
                        <select id="prodi" name="prodi"
                            class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300  bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" {{ old('prodi') == '' ? 'selected' : '' }}>Pilih Prodi</option>
                            <option value="1" {{ old('prodi') == '1' ? 'selected' : '' }}>Sistem informasi</option>
                            <option value="2" {{ old('prodi') == '2' ? 'selected' : '' }}>Teknik Komputer</option>
                            <option value="3" {{ old('prodi') == '3' ? 'selected' : '' }} hidden>Tidak dipilih
                            </option>
                        </select>

                    </div>
                </div>
                <div class="mb-6">
                    <label for="kode_matkul"
                        class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Kode</label>
                    <input type="text" id="kode_matkul" name="kode_matkul" value="{{ old('kode_matkul') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>

                <div class="mb-6">
                    <label for="message"
                        class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Pemberitahuan</label>
                    <textarea id="message" rows="4" name="pemberitahuan" maxlength="254"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50  border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('pemberitahuan') }}</textarea>
                </div>


                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>
        <x-error-alert></x-error-alert>
        <x-success-alert></x-success-alert>
    </div>
@endsection
