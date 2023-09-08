<div class="grid grid-cols-1 xl:grid-cols-8 gap-2 xl:gap-5">

    @if ($dosen->foto)
        <div class="col-span-1 xl:col-span-1">
            <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white xl:text-right">Foto</label>
        </div>

        <div class="col-span-1 xl:col-span-7">
            <img class="w-20 h-20 rounded-full" src="{{ Storage::url($dosen->foto) }}" alt="Rounded avatar">

        </div>
    @endif

    <div class="col-span-1 xl:col-span-1">
        <label
            class="block mb-2 text-sm font-medium text-blue-600 dark:text-white xl:text-right hidden md:block">NIDN</label>
    </div>

    <div class="col-span-1 xl:col-span-7 relative z-0 w-full group ">
        <input type="text" id="nidn" disabled value="{{ old('nama', $dosen->nidn) }}"
            class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " required />
        <label for="nidn"
            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NIDN</label>
    </div>


    <div class="col-span-1 xl:col-span-1">
        <label
            class="block mb-2 text-sm font-medium text-blue-600 dark:text-white xl:text-right hidden md:block">Nama<span
                class="text-red-600">*</span></label>
    </div>

    <div class="col-span-1 xl:col-span-7 relative z-0 w-full group ">
        <input type="text" name="nama" id="nama" pattern="^[A-Za-z .]+$"
            value="{{ old('nama', $dosen->nama) }}"
            class="block py-2.5 px-0 w-full text-sm font-bold text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " required />
        <label for="nama"
            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
            Lengkap</label>
    </div>


    <div class="col-span-1 xl:col-span-1">
        <label class="block text-sm font-medium text-blue-600 dark:text-white xl:text-right">Upload
            Foto</label>
    </div>

    <div class="col-span-1 xl:col-span-7">
        <input name="foto"
            class="block text-sm text-gray-900 border border-gray-300 cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            aria-describedby="file_input_help" id="file_input" type="file">
    </div>

    <div class="col-span-1 xl:col-span-1">
        <label class="block"></label>
    </div>
    <div class="col-span-1 xl:col-span-7">
        <button type="submit"
            class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
    </div>
</div>
