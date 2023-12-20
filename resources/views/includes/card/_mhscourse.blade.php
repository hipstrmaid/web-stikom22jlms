<div class="bg-white border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700 rounded-lg overflow-hidden">
    <a href="{{ route('matkul.pertemuanPreview', ['id' => $matkul->matkul->id]) }}">
        <img class="w-full h-48 object-cover border border-b dark:border-gray-800"
            src="{{ Storage::url($matkul->matkul->gambar) }}" alt="Course Image">
    </a>
    <div class="flex flex-col flex-grow">
        <div class="content px-4 py-2 flex flex-col">
            <div class="card-category">
                @if ($matkul->matkul->prodi->nama_prodi == 'Sistem Informasi')
                    <span
                        class="bg-blue-100 text-blue-800 text-xs font-medium font-sm mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $matkul->matkul->prodi->nama_prodi }}</span>
                @elseif ($matkul->matkul->prodi->nama_prodi == 'Teknik Komputer')
                    <span
                        class="bg-green-100 text-green-800 text-xs font-medium font-sm mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $matkul->matkul->prodi->nama_prodi }}</span>
                @endif
                <span
                    class="bg-orange-100 text-orange-800 dark:text-white dark:bg-gray-700 text-xs font-medium font-sm mr-2 px-2.5 py-0.5 rounded dark:bg-orang-900 dark:text-orange-800">{{ $matkul->matkul->semester->nama_semester }}</span>
            </div>
            <div class="card-title pt-2">
                <a href="{{ route('matkul.pertemuanPreview', ['id' => $matkul->matkul->id]) }}">
                    <p class="text-lg font-semibold text-gray-800 dark:text-white hover:text-blue-500">
                        {{ $matkul->matkul->nama_matkul }}</p>
                </a>
            </div>
            <div class="card-description">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ $matkul->matkul->excerpt() }}</p>
            </div>
        </div>

        <div class="card-footer border-t dark:border-gray-700">
            <div class="flex py-2 px-4">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full object-cover"
                        src="{{ Storage::url($matkul->matkul->dosen->foto) }}" alt="Instructor Avatar">
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $matkul->matkul->dosen->nama }}
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $matkul->matkul->dosen->user->role->nama_role }}
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
