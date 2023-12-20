@extends('layouts.app')
@section('content')
    <h1 class="mb-1 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">
        Edit Mata Kuliah</h1>
    {{ Breadcrumbs::render('editMatkul', $matkul) }}
    <div class="grid grid-cols-1 mb-5">
        <ul class="flex bg-gray-200 dark:bg-gray-900">
            <div class="bg-white dark:bg-gray-800 flex items-center dark:border-gray-900">
                <i class="fa-solid fa-lock ml-4 dark:text-white"></i>
                <h5 class="text-sm text-gray-900 dark:text-white py-2 ml-2 mr-4 font-bold">
                    <a href="{{ route('matkul.edit', ['matkul' => $matkul->id]) }}">Mata
                        Kuliah</a>
                </h5>
            </div>
            <div class="flex items-center border border-gray-200 border-b-0 rounded-t dark:border-gray-900  ">
                <i class="fa-solid fa-address-card ml-4 dark:text-white"></i>
                <h5 class="text-sm text-gray-900 dark:text-white py-2 ml-2 mr-4 font-bold"><a
                        href="{{ route('pertemuan.indexPertemuan', ['id' => $matkul->id]) }}">Pertemuan</a></h5>
            </div>
            <div class="flex items-center dark:border-gray-900 dark:bg-gray-900">
                <i class="fa-solid fa-users ml-4 dark:text-white"></i>
                <h5 class="text-sm text-gray-900 dark:text-white py-2 ml-2 mr-4 font-bold">Peserta</h5>
            </div>
        </ul>

        <div class="bg-white text-sm border border-gray-200 border-t-0 dark:border-gray-900 dark:bg-gray-800">
            <ul class="grid w-full gap-2 mb-4 p-5">
                <form action="{{ route('matkul.update', ['matkul' => $matkul->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Nama Mata
                            Kuliah</label>
                        <input type="text" id="email" name="nama_matkul" value="{{ $matkul->nama_matkul }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="cth. Pemrograman Database II" required>
                    </div>

                    <div class="mb-6">

                        <label for="message"
                            class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Deskripsi</label>
                        <textarea id="message" rows="4" name="deskripsi" maxlength="254" value="{{ $matkul->deskripsi }}"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Sedikit deskripsi tentang mata kuliah ini...">{{ $matkul->deskripsi }}</textarea>
                    </div>

                    <div class="grid gap-0 sm:gap-4 sm:grid-cols-3">
                        <div>
                            <label for="prodi"
                                class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Prodi</label>
                            <select id="prodi" name="prodi"
                                class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="{{ $matkul->prodi_id }}" selected>{{ $matkul->prodi->nama_prodi }}</option>
                                <option value="1">Sistem informasi</option>
                                <option value="2">Teknik Komputer</option>
                                <option value="3" hidden>Tidak dipilih</option>
                            </select>
                        </div>


                        <div>
                            <label for="semester"
                                class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Semester</label>
                            <select id="semester" name="semester_id"
                                class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="{{ $matkul->semester_id }}" selected>{{ $matkul->semester->nama_semester }}
                                </option>
                                <option value="1">Semester 1</option>
                                <option value="2">Semester 2</option>
                                <option value="3">Semester 3</option>
                                <option value="4">Semester 4</option>
                                <option value="5">Semester 5</option>
                                <option value="6">Semester 6</option>
                                <option value="7">Semester 7</option>
                                <option value="8">Semester 8</option>
                            </select>
                        </div>
                        <div>
                            <label for="hari"
                                class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Hari</label>
                            <select id="hari" name="hari"
                                class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="{{ $matkul->hari }}" selected>{{ $matkul->hari }}</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                        </div>
                        <div class="flex gap-4">
                            <div>
                                <label for="jam"
                                    class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Jam</label>
                                <input type="text" id="jam" name="jam_mulai" maxlength="5"
                                    class="rounded-lg w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                    required placeholder="cth: 14:20" value="{{ substr($matkul->jam_mulai, 0, -3) }}">
                            </div>
                            <div>
                                <label for="jam"
                                    class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Jam</label>
                                <input type="text" id="jam" name="jam_selesai" maxlength="5"
                                    class="rounded-lg w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                    required placeholder="cth: 14:20" value="{{ substr($matkul->jam_selesai, 0, -3) }}">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="kode_matkul"
                                class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Kode Mata
                                Kuliah</label>
                            <input type="text" id="kode_matkul" name="kode_matkul" value="{{ $matkul->kode_enroll }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>

                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white"
                                for="file_input">Thumbnail</label>
                            <input
                                class="block w-full text-sm font-medium text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" id="file_input" type="file" name="gambar">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
                                {{ $matkul->gambar }}
                            </p>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="message"
                            class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Pemberitahuan</label>
                        <textarea id="message" rows="4" name="pemberitahuan" maxlength="254" value="{{ $matkul->pemberitahuan }}"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $matkul->pemberitahuan }}</textarea>
                    </div>


                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>

            </ul>
        </div>


    </div>
@endsection
