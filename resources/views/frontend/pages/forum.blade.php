@extends('layouts.app')
@section('content')

    <div class="flex justify-between items-center w-full">
        <x-content-title>Forum</x-content-title>
        @if (Auth::user()->role_id == 2)
            <x-modal-toggle>
                <i class="fas fa-plus mr-2 items-center justify-center"></i>
                <p>Buat Forum</p>
            </x-modal-toggle>
        @endif
    </div>
    {{ Breadcrumbs::render('forum') }}
    <x-panel.panel-body>
        <div class="h-auto">
            @isset($matkuls)
                <div class="row flex flex-col">
                    <div class="card-header flex justify-end">
                        <x-modal>
                            <x-panel.panel-body>
                                <form class="max-w-sm mx-auto" method="POST" action="{{ route('forum.store') }}">
                                    @csrf
                                    <label for="countries"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                                        Mata Kuliah</label>
                                    <div class="mb-5">
                                        <select id="matkuls" name="matkul_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @foreach ($matkuls as $matkul)
                                                <option value="{{ $matkul->id }}">{{ $matkul->nama_matkul }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4">
                                        Finish
                                    </button>
                                </form>

                            </x-panel.panel-body>
                        </x-modal>
                    </div>
                    <div class="text-sm dark:text-gray-50">
                        <ul class="grid w-full gap-2">
                            @foreach ($forums as $forum)
                                <li
                                    class="flex bg-white items-center justify-between p-3 bg-gray-100 shadow-sm dark:bg-gray-800 border border-gray-200 dark:border-gray-700 dark:bg-gray-800">
                                    <div class="media-left mr-3">
                                        <!-- Your media-left content -->
                                        <i class="fa-solid fa-file-lines text-3xl text-yellow-200"></i>
                                    </div>
                                    <div class="media-body flex-1">
                                        <!-- Your media-body content -->
                                        <h4 class="text-1xl text-blue-500 hover:underline font-bold "><a
                                                href="{{ route('forum.show', $forum->id) }}">{{ $forum->matkul->nama_matkul }}</a>
                                        </h4>
                                        <p class="text-xs">{{ $forum->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="media-right ml-2">
                                        <!-- Your media-right content -->
                                        <a href="#"
                                            class="flex items-center gap-2 p-2 border border-gray-200 dark:border-gray-600 dark:bg-gray-800  hover:bg-gray-100 dark:hover:-bg-gray-200"><i
                                                class="fa-regular fa-comment text-1xl"></i><span>{{ $forum->topic->count() }}</span></a>


                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            @endisset
            <x-error-alert></x-error-alert>
            <x-success-alert></x-success-alert>
        </div>
    </x-panel.panel-body>
@endsection
