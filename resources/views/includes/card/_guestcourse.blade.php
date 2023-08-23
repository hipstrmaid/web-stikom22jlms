@isset($matkuls)
    <div class="list-matkul">
        <div id="accordion-collapse" class="flex flex-col gap-2" data-accordion="collapse">
            @foreach ($matkuls as $semesterId => $matkulGroup)
                <h2 id="accordion-collapse-heading-{{ $semesterId }}">
                    <button type="button"
                        class="flex items-center justify-between w-full bg-white dark:bg-gray-900 p-3 font-medium text-left text-gray-900 border border-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                        data-accordion-target="#accordion-collapse-body-{{ $semesterId }}"
                        aria-controls="accordion-collapse-body-{{ $semesterId }}">
                        <span class="text-sm"><i class="fas fa-folder mr-2"></i>Semester {{ $semesterId }}</span>
                        <x-arrow-down></x-arrow-down>
                    </button>
                </h2>
                <div id="accordion-collapse-body-{{ $semesterId }}" class="hidden"
                    aria-labelledby="accordion-collapse-heading-{{ $semesterId }}">
                    <div class="dark:bg-gray-900">
                        <div class="row">
                            <div class="flex flex-col">
                                @foreach ($matkulGroup as $matkul)
                                    {{-- <div
                                        class="bg-white border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700 rounded-lg overflow-hidden">
                                        <img class="w-full h-48 object-cover border border-b dark:border-gray-800"
                                            src="{{ Storage::url($matkul->gambar) }}" alt="Course Image">
                                        <div class="p-4">
                                            <h2 class="text-md font-semibold text-gray-800 dark:text-white mb-2">
                                                {{ $matkul->nama_matkul }}</h2>
                                            <p class="text-sm leading-normal text-gray-600 dark:text-gray-400 mb-4">
                                                {{ $matkul->excerpt() }}</p>
                                            <div class="">
                                                <div>
                                                    <a href="{{ route('enroll.previewMatkul', ['id' => $matkul->id]) }}"
                                                        class="w-full inline-flex justify-center rounded px-3 py-2 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        Detail
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <a href="{{ route('enroll.previewMatkul', ['id' => $matkul->id]) }}"
                                        class="flex justify-between items-center border border-gray-200 w-full mb-2 py-2 px-2  bg-white dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 hover:bg-gray-300">
                                        <div class="flex flex-col">
                                            <p class="text-base font-bold text-blue-500">{{ $matkul->nama_matkul }}</p>
                                            <p class="text-xs">Dosen: {{ $matkul->dosen->nama }}</p>
                                        </div>
                                        <i class="fa-solid fa-key"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endisset
{{-- grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-2 --}}
