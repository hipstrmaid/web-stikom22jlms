<!-- Main modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-auto">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Materi
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="defaultModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <ul class="flex flex-col gap-4">
                    <li class="flex">
                        <a href="#"
                            class="flex items-center gap-4 rounded-sm w-full bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                            <div class="bg-blue-500 w-16 h-16 inline-flex justify-center items-center">
                                <i class="fa-solid fa-file fa-xl text-white"></i>
                            </div>
                            <div class="flex flex-col">
                                <p class="text-md text-dark dark:text-white">File</p>
                                <p class="text-xs text-dark dark:text-white">Word, Excel, PPT, Gambar/Video.</p>
                            </div>
                        </a>
                    </li>
                    <li class="flex">
                        <a href="#"
                            class="flex items-center gap-4 rounded-sm w-full bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                            <div class="bg-yellow-500 w-16 h-16 inline-flex justify-center items-center">
                                <i class="fa-solid fa-file-arrow-up fa-xl text-white"></i>
                            </div>
                            <div class="flex flex-col">
                                <p class="text-md text-dark dark:text-white">Tugas</p>
                                <p class="text-xs text-dark dark:text-white">Beri tugas kepada mahasiswa.</p>
                            </div>
                        </a>
                    </li>

                    <li class="flex">
                        <a href="{{ route('materi.createVideo', ['id' => $pertemuan->id]) }}"
                            class="flex items-center gap-4 rounded-sm w-full bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                            <div class="bg-red-500 w-16 h-16 inline-flex justify-center items-center">
                                <i class="fa-brands fa-youtube fa-xl text-white"></i>
                            </div>
                            <div class="flex flex-col">
                                <p class="text-md text-dark dark:text-white">Youtube</p>
                                <p class="text-xs text-dark dark:text-white">Url video youtube.</p>
                            </div>
                        </a>
                    </li>




                </ul>


            </div>
        </div>
    </div>
</div>
