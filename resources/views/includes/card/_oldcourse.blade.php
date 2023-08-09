<div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg border-b border-gray-200 dark:border-gray-800 h-100"
            src="{{ Storage::url($matkul->gambar) }}" alt="thumbnail" />
    </a>
    <div class="p-5">
        <span
            class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $matkul->hari }}</span>
        <a href="#">
            <h5 class="my-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $matkul->nama_matkul }}</h5>
        </a>
        <p class="mb-3 font-xs text-gray-700 dark:text-gray-400">
            {{ $matkul->excerpt() }}
        </p>

        <div class="w-full bg-gray-200 rounded-full h-2.5 mb-2.5 dark:bg-gray-700">
            <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
        </div>
        <div class="panel-footer flex flex-col gap-2">
            @if (Auth::check() && $matkul->dosen_id == Auth::user()->dosen->id)
                <button
                    class="w-full px-3 py-2 text-sm font-medium text-white bg-green-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-green-800 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    <a href="/matkul/pertemuan" class="inline-flex  items-center"><i
                            class="fa-solid fa-pen-to-square mr-2"></i> Edit Mata Kuliah
                    </a>
                </button>
            @endif

            <button
                class="w-full px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <a href="/matkul/pertemuan/belajar" class=" inline-flex items-center">
                    Belajar
                </a>
            </button>
        </div>
    </div>
</div>
