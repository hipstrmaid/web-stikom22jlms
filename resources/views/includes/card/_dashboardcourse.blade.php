<div class="bg-white border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700 rounded-lg overflow-hidden">
    <img class="w-full h-48 object-cover border border-b dark:border-gray-800" src="{{ Storage::url($matkul->gambar) }}"
        alt="Course Image">
    <div class="p-4">
        <h2 class="text-md font-semibold text-gray-800 dark:text-white mb-2">{{ $matkul->nama_matkul }}</h2>
        <p class="text-sm leading-normal text-gray-600 dark:text-gray-400 mb-4">{{ $matkul->excerpt() }}</p>
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full" src="{{ Storage::url($matkul->dosen->foto) }}"
                    alt="Instructor Avatar">
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $matkul->dosen->nama }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $matkul->dosen->user->role->nama_role }}</p>
            </div>
        </div>
    </div>
</div>
