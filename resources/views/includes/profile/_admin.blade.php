<div class="grid grid-cols-1 xl:grid-cols-8 gap-2 xl:gap-5">

    @if ($admin->foto)
        <div class="col-span-1 xl:col-span-1">
            <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white xl:text-right">Foto</label>
        </div>

        <div class="col-span-1 xl:col-span-7 flex-grow flex items-center">
            {{-- <div class="">
                <img class="w-20 h-20 rounded-full" src="{{ Storage::url($admin->foto) }}" alt="Rounded avatar">
            </div> --}}


            <img class="h-24 w-23 rounded-lg shadow-xl dark:shadow-gray-800" src="{{ Storage::url($admin->foto) }}"
                alt="image description">

            {{-- <div class=" ml-5 w-30">
                <input
                    class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-xs font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                    id="formFileSm" type="file" name="foto" />
            </div> --}}

        </div>
    @endif

    <div class="col-span-1 xl:col-span-1">
        <label
            class="block mb-2 text-sm font-medium text-blue-600 dark:text-white xl:text-right hidden md:block">NIDN</label>
    </div>

    <div class="col-span-1 xl:col-span-7 relative z-0 w-full group ">
        <input type="text" id="nidn" disabled value="{{ old('nama', $admin->nidn) }}"
            class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " required />
        <label for="nidn"
            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NIDN</label>
    </div>


    <div class="col-span-1 xl:col-span-1">
        <label
            class="block mb-2 text-sm font-medium text-blue-600 dark:text-white xl:text-right hidden md:block">Nama</label>
    </div>

    <div class="col-span-1 xl:col-span-7 relative z-0 w-full group ">
        <input type="text" name="nama" id="nama" value="{{ old('nama', $admin->nama) }}"
            class="block py-2.5 px-0 w-full text-sm font-bold text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " required />
        <label for="nama"
            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
            Lengkap</label>
    </div>


    <div class="col-span-1 xl:col-span-1">
        <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white xl:text-right">Upload
            Foto</label>
    </div>

    <div class="col-span-1 xl:col-span-7">
        <input name="foto"
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-sm cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
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
