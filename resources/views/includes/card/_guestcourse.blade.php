<div class="list-matkul">
    <div id="accordion-collapse" class="flex flex-col gap-2 shadow shadow-b" data-accordion="collapse">
        @foreach ($matkuls as $semesterId => $semesterMatkuls)
            <h2 id="accordion-collapse-heading-{{ $semesterId }}">
                <button type="button"
                    class="flex items-center justify-between w-full p-2 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                    data-accordion-target="#accordion-collapse-body-{{ $semesterId }}"
                    aria-controls="accordion-collapse-body-{{ $semesterId }}">
                    <span>Mata Kuliah: Semester {{ $semesterId }}</span>
                    <x-arrow-down></x-arrow-down>
                </button>
            </h2>
            <div id="accordion-collapse-body-{{ $semesterId }}" class="hidden"
                aria-labelledby="accordion-collapse-heading-{{ $semesterId }}">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    <div class="row">
                        @foreach ($semesterMatkuls as $matkul)
                            <ul class="w-full">
                                <li class="border bg-gray-200 text-dark p-2">
                                    <a href="#" class="hover:text-blue-600">{{ $matkul->nama_matkul }}</a>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
