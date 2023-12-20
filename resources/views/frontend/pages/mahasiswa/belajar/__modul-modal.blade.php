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
            <div class="p-2">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab"
                                data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                                aria-selected="false">Modul</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                                aria-controls="dashboard" aria-selected="false">List Modul</button>
                        </li>
                    </ul>
                </div>
                <div id="myTabContent">
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                        aria-labelledby="profile-tab">
                        <ul class="flex flex-col gap-4">
                            <li class="flex">
                                <a href="{{ route('materi.createFile', ['id' => $pertemuan->id]) }}"
                                    class="flex shadow-md items-center gap-4 rounded-sm w-full bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                                    <div class="bg-blue-400 w-16 h-16 inline-flex justify-center items-center">
                                        <i class="fa-solid fa-file fa-xl text-white"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <p class="text-md font-bold text-dark dark:text-white">File</p>
                                        <p class="text-xs text-dark dark:text-white">Word, Excel, PPT, Gambar/Video.</p>
                                    </div>
                                </a>
                            </li>

                            <li class="flex">
                                <a href="{{ route('materi.createVideo', ['id' => $pertemuan->id]) }}"
                                    class="flex shadow-md items-center gap-4 rounded-sm w-full bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                                    <div
                                        class="bg-red-400 dark:bg-red-500 w-16 h-16 inline-flex justify-center items-center">
                                        <i class="fa-brands fa-youtube fa-xl text-white"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <p class="text-md font-bold text-dark dark:text-white">Youtube</p>
                                        <p class="text-xs text-dark dark:text-white">Url video youtube.</p>
                                    </div>
                                </a>
                            </li>

                            <li class="flex">
                                <a href="{{ route('materi.createTugas', ['pertemuanId' => $pertemuan->id]) }}"
                                    class="flex shadow-md items-center gap-4 rounded-sm w-full bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                                    <div class="bg-yellow-400 w-16 h-16 inline-flex justify-center items-center">
                                        <i class="fa-solid fa-file-arrow-up fa-xl text-white"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <p class="text-md font-bold text-dark dark:text-white">Tugas</p>
                                        <p class="text-xs text-dark dark:text-white">Beri tugas kepada mahasiswa.</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>


                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                        aria-labelledby="dashboard-tab">
                        <div
                            class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                            <h1 class="font-bold">File</h1>
                            <hr class="mb-2">
                            @foreach ($files as $file)
                                <form action="{{ route('materi.destroyfile', ['id' => $file->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div
                                        class="flex items-center mb-2 justify-between p-2 rounded-md w-full dark:bg-gray-600 dark:border-gray-600 text-dark border border-gray-200">
                                        <a href="#" aria-current="true" class="block w-full cursor-pointer">
                                            {{ $file->nama_file }}.{{ $file->extensi }}
                                        </a>
                                        <div class="flex">
                                            {{-- <button class="px-2 py-1 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none">
                                            Edit
                                        </button> --}}
                                            <button
                                                class="ml-2 px-2 py-1 text-white bg-red-500 rounded-lg hover:bg-red-600 focus:outline-none">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                            @foreach ($images as $image)
                                <form action="{{ route('materi.destroyImage', ['id' => $image->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div
                                        class="flex items-center mb-2 justify-between p-2 rounded-md w-full dark:bg-gray-600 dark:border-gray-600 text-dark border border-gray-200">
                                        <a href="#" aria-current="true" class="block w-full cursor-pointer">
                                            {{ $image->nama_file }}.{{ $image->extensi }}
                                        </a>
                                        <div class="flex">
                                            {{-- <button class="px-2 py-1 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none">
                                        Edit
                                    </button> --}}
                                            <button
                                                class="ml-2 px-2 py-1 text-white bg-red-500 rounded-lg hover:bg-red-600 focus:outline-none">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                            <h1 class="font-bold mt-2">Youtube</h1>
                            <hr class="mb-2">
                            @foreach ($youtubes as $youtube)
                                <form action="{{ route('materi.destroyYoutube', ['id' => $youtube->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div
                                        class="flex items-center mb-2 justify-between p-1 rounded-sm w-full dark:bg-gray-600 dark:border-gray-600 text-dark border border-gray-200">
                                        <a href="#" aria-current="true" class="block w-full cursor-pointer">
                                            {{ $youtube->deskripsi }}
                                        </a>
                                        <div class="flex">
                                            {{-- <button class="px-2 py-1 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none">
                                        Edit
                                    </button> --}}
                                            <button
                                                class="ml-2 px-2 py-1 text-white bg-red-500 rounded-lg hover:bg-red-600 focus:outline-none">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @endforeach

                        </div>
                    </div>





                </div>



            </div>
        </div>
    </div>
</div>
