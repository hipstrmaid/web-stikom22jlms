@extends('layouts.app')
@section('content')
    <div class="flex flex-col h-full">
        <div class="flex justify-between items-center w-full">
            <x-content-title>Topik Forum</x-content-title>
        </div>
        {{ Breadcrumbs::render('forum') }}


        <div class="row flex flex-col h-full gap-5">
            <x-panel.panel-body>
                <div class="panel-head items-center flex">
                    <div class="flex flex-col w-full  dark:text-gray-50 dark:text-gray-400">
                        <h1 class="md:text-2xl text-md font-bold">{{ $forum->matkul->nama_matkul }}</h1>
                        <p class="lg:text-sm text-sm tracking-tight text-gray-500 ">Yang sedang dibicarakan saat
                            ini.</p>
                    </div>

                    <x-modal-toggle> <i class="fa-solid fa-plus"></i>
                        <p class="text-xs lg:text-md">TAMBAH</p>
                    </x-modal-toggle>

                    <x-modal>
                        <x-panel.panel-body>
                            <form class="w-full max-w-lg" action="{{ route('topic.store') }}" method="POST">
                                @csrf
                                <div class="flex flex-wrap px-3 mb-6">
                                    <div class="w-full">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-last-name">
                                            Judul Topik
                                        </label>
                                        <input
                                            class="appearance-none block w-full px-3 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            id="grid-last-name" type="text" placeholder="" name="judul">
                                        <input type="hidden" name="forum_id" value="{{ $forumId }}">
                                    </div>
                                </div>
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ml-3">
                                    Finish
                                </button>
                            </form>
                        </x-panel.panel-body>
                    </x-modal>
                </div>
            </x-panel.panel-body>

            <x-panel.panel-body>
                <div class="topics h-full">
                    @foreach ($topics as $topic)
                        <div
                            class="flex justify-between p-2 items-center bg-white dark:bg-gray-800  text-sm border border-b-1 dark:border-gray-700">
                            <div class="panel-content flex">
                                <div class="logo-topik text-lg text-blue-400 dark:text-white p-2">
                                    <i class="fa-solid fa-file-lines fa-2xl"></i>
                                </div>
                                <div class="judul-topik text-xs">
                                    <a href="{{ route('comment.show', $topic->id) }}"
                                        class="text-md text-base dark:text-gray-50 hover:underline">{{ $topic->judul }}</a>
                                    <div class="info-topik flex text-gray-500 gap-1">
                                        <p>oleh</p>
                                        <p class="text-blue-400 dark:text-blue-400">
                                            {{ optional($topic->user->dosen)->nama ?? optional($topic->user->mahasiswa)->nama }}
                                        </p>
                                        <p>| <i class="fa-regular fa-clock fa-xs"></i>
                                            {{ $topic->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="media-right ml-2 text-xs font-bold dark:text-white">
                                <!-- Your media-right content -->
                                <a href="#"
                                    class="flex items-center gap-2 p-2 border border-gray-200 dark:border-gray-600 dark:bg-gray-800 hover:bg-gray-100 dark:hover:-bg-gray-200"><i
                                        class="fa-regular fa-comment"></i><span>{{ $topic->comment->count() }}</span></a>


                            </div>
                        </div>
                    @endforeach

                </div>
            </x-panel.panel-body>
        </div>
        <x-error-alert></x-error-alert>
        <x-success-alert></x-success-alert>
    </div>
@endsection
