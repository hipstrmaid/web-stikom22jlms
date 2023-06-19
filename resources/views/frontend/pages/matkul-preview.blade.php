@extends('frontend.app')
@section('content')
    <div class="row">
        <div class="grid grid-cols-1 lg:grid-cols-4 lg:gap-4 mb-4 h-46">

            <div class="col-span-1">
                <div class="bg-white border border-gray-200 rounded-t shadow dark:border-gray-900 dark:bg-gray-800">
                    <h5 class="text-gray-900 dark:text-white py-2 px-4 font-bold">Detail Mata Kuliah</h5>
                </div>
                <div class="bg-white text-sm border border-gray-200 dark:border-gray-900 dark:bg-gray-800">
                    <ul class="grid w-full gap-2 mt-4 mb-4">

                        <li class="flex items-center">
                            <i class="fa-solid fa-user ml-4 dark:text-white"></i>
                            <p class="dark:text-white px-2">Dosen : Etika Purnamasari</p>
                        </li>

                        <li class="flex items-center">
                            <i class="fa-solid fa-calendar ml-4 dark:text-white"></i>
                            <p class="dark:text-white px-2">Selasa</p>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-clock ml-4 dark:text-white"></i>
                            <p class="dark:text-white px-2">14:55</p>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-users ml-4 dark:text-white"></i>
                            <p class="dark:text-white px-2">22</p>
                        </li>

                    </ul>

                </div>
                <div class="bg-white border border-gray-200 rounded-b shadow dark:border-gray-900 dark:bg-gray-800">
                    <div class="p-2">
                        <a href="/matkul/preview"
                            class="w-full inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            Belajar <i class="fa-solid fa-arrow-right ml-2 bg-dark"></i>
                        </a>

                    </div>
                </div>
            </div>

            <div class="col-span-3">
                <h1
                    class="text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">
                    Pemrograman Berorientasi Obejek
                </h1>
                <div class="video-player mt-2 mb-2">
                    <iframe class="w-full max-w-full" height="300" src="https://www.youtube.com/embed/lPJVi797Uy0"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Voluptate aliquid suscipit, officia at quasi ex tenetur earum id perferendis corrupti,
                    modi eos quam rerum voluptatum dolorem nam ullam aliquam incidunt praesentium atque repudiandae pariatur
                    accusantium sapiente voluptates? Culpa, dicta suscipit, mollitia facilis reiciendis cum illo,
                    reprehenderit sapiente architecto veritatis natus?</p>


            </div>




        </div>
    </div>
@endsection
