@extends('layouts.app')
@section('content')
    <div class="row flex flex-col gap-4">
        <div class="grid mb-4 bg-white text-sm border border-gray-200 border-t-0 dark:border-gray-900 dark:bg-gray-800">
            <div class="panel-head p-4">
                <div class="panel-content p-2 flex">
                    <div class="judul-topik">
                        <a href="#" class="text-xl font-bold dark:text-gray-50">Bagaimana menurut kalian dengan materi
                            tadi?</a>
                        <div class="info-topik flex text-gray-500 text-sm gap-2">
                            <p class="">oleh</p>
                            <a href="" class="text-sm text-blue-400 dark:text-blue-400">Muhammad
                                Rizky</a>
                            <p>| 2 days ago</p>
                        </div>
                    </div>

                </div>

            </div>
            <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
            <div class="komentar p-4 flex">
                <div class="mr-3 shrink-0 flex">
                    <div class=" p-2 rounded-lg">
                        <img class="w-10 h-10 rounded-full img-thumbnail  " src="{{ asset('assets/img/profile.jpg') }}"
                            alt="Flowbite logo">
                    </div>
                    <div class="flex flex-col items-baseline mt-2">
                        <h1 class="text-dark-400 dark:text-gray-50 text-sm font-bold">Uchiyama Kouki</h1>
                        <p class="text-xs dark:text-gray-200">2 Minutes ago</p>
                    </div>
                </div>
            </div>
        </div>
    @endsection
