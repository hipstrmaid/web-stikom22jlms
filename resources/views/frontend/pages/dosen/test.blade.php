<div class="flex w-full h-screen items-center justify-center bg-grey-lighter">
    <label
        class="w-64 flex flex-col items-center px-4 py-6 bg-white text-black rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-500 hover:text-white">
        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path
                d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
        </svg>
        <span class="mt-2 text-base leading-normal">Select a file</span>
        <input type='file' id="file_input" aria-describedby="file_input_help" class="hidden" />
    </label>
</div>








<div class="row flex flex-col gap-6 w-full">
    <div class="col flex gap-4">
        @if ($admin->foto)
            <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white xl:text-right">Foto</label>
            <img class="w-20 h-20 rounded-full" src="{{ Storage::url($admin->foto) }}" alt="Rounded avatar">
        @endif
    </div>
    <div class="col flex gap-4">
        <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white xl:text-right">NIDN</label>
        <div class="relative z-0 w-full group">
            <input type="text" id="nidn" disabled value="{{ old('nama', $admin->nidn) }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required />
            <label for="nidn"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NIDN</label>
        </div>
    </div>

    <div class="col flex gap-10">
        <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white xl:text-right">Nama</label>
        <div class="relative z-0 w-full group">
            <input type="text" name="nama" id="nama" value="{{ old('nama', $admin->nama) }}"
                class="block py-2.5 px-0 w-full text-sm font-bold text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required />
            <label for="nama"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                Lengkap</label>
        </div>
    </div>

    <div class="col flex gap-10">
        <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white xl:text-right">
            Foto</label>
        <input name="foto"
            class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            aria-describedby="file_input_help" id="file_input" type="file">
    </div>

    <div class="col flex gap-4">
        <label class="block"></label>
        <button type="submit"
            class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
    </div>

</div>
