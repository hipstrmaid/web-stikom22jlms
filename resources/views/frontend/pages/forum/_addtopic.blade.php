@extends('layouts.app')
@section('content')
    <x-panel.panel-top>
        <h1 class="text-2xl font-bold">Buat Topik</h1>
    </x-panel.panel-top>
    <x-panel.panel-body>

        <form class="w-full max-w-lg">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Judul Topik
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-last-name" type="text" placeholder="" name="judul">
                </div>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ml-3">
                Finish
            </button>
        </form>

    </x-panel.panel-body>



    {{-- <div class="row shadow-sm">
        <div class="grid mb-4 bg-white text-sm border border-gray-300 dark:border-gray-900 dark:bg-gray-800">
            <div class="panel-head flex items-center gap-4 p-4">

                <div class="flex flex-col w-full  dark:text-gray-50 dark:text-gray-400">
                    <h1 class="text-2xl font-bold">Topik</h1>
                    <p class="tracking-tight text-gray-500 ">Yang sedang dibicarakan saat
                        ini.</p>
                </div>

                <button class="flex items-center p-2 dark:text-gray-50 hover:bg-gray-100 dark:hover:bg-gray-600">
                    <i class="fa-solid fa-plus"></i>
                    <a href="{{ route('topic.create') }}" class="text-bold">Tambah</a>
                </button>
            </div>
        </div>
    </div> --}}
    <x-error-alert></x-error-alert>
    <x-success-alert></x-success-alert>
@endsection
