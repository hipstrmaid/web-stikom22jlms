@extends('layouts.app')
@section('content')
    <div class="flex flex-col h-full">
        {{-- <div class="flex flex-col">
            <x-content-title>Discussion</x-content-title>
            {{ Breadcrumbs::render('forum') }}
        </div> --}}
        <div class="flex flex-col h-full justify-between rounded rounded-t-lg border border-gray-300 dark:border-gray-600 ">

            <div class="bg-white w-full px-5 py-2">
                <div class="row flex flex-col">
                    <div class="grid dark:border-gray-900">
                        <div class="panel-head py-2">
                            <div class="panel-content flex justify-between">
                                <div class="judul-topik">
                                    <p class="md:text-2xl font-bold dark:text-gray-50">
                                        {{ $topics->forum->matkul->nama_matkul }}
                                    </p>
                                    <div class="info-topik flex text-gray-500 text-sm gap-1 text-xs">
                                        <p>Topik</p>
                                        <a href="{{ route('matkul.pertemuanPreview', ['id' => $topics->forum->matkul]) }}"
                                            class="text-blue-500 dark:text-blue-400">{{ $topics->judul }}</a>
                                        <p>| {{ $createdAt }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="p-5 overflow-auto">
                @foreach ($comments as $comment)
                    @php
                        $isCurrentUser = $comment->user->id === Auth::id();
                    @endphp
                    <li class="mb-3 flex {{ $isCurrentUser ? 'justify-end' : '' }}">
                        <div class="mr-2 flex flex-col items-center {{ $isCurrentUser ? 'order-2 ml-2' : '' }}">
                            @isset($comment->user->mahasiswa)
                                <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                    <img class="rounded-full"
                                        src="{{ $comment->user->mahasiswa->foto ? Storage::url($comment->user->mahasiswa->foto) : asset('assets/img/user.png') }} "
                                        alt="foto">
                                </div>
                            @else
                                <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                    <img class="w-10 h-10 border border-lg border-gray-200 dark:border-gray-500 rounded-full"
                                        src="{{ Storage::url($comment->user->dosen->foto) }}" alt="foto">
                                </div>
                                <p class="text-xs font-bold text-blue-500">Dosen</p>
                            @endisset
                        </div>
                        <div
                            class="py-2 px-4 bg-white rounded rounded-lg border border-gray-200 shadow-sm dark:bg-gray-700 dark:border-gray-600 {{ $isCurrentUser ? 'text-right ml-12 mr-0' : '' }}">
                            <div class="flex items-center gap-1 {{ $isCurrentUser ? 'justify-end' : '' }}">
                                <h1
                                    class="text-xs font-semibold text-gray-900 dark:text-white {{ $isCurrentUser ? 'order-3' : '' }}">
                                    {{ optional($comment->user->mahasiswa)->nama ?? optional($comment->user->dosen)->nama }}
                                </h1>
                                <span
                                    class="dark:text-white md:block hidden {{ $isCurrentUser ? 'order-2' : '' }}">-</span>
                                <p
                                    class="text-xs md:block hidden tracking-tighter dark:text-gray-200 {{ $isCurrentUser ? 'order-1' : '' }}">
                                    {{ $comment->created_at->diffForHumans() }}</p>
                            </div>

                            </span>
                            <p
                                class="flex text-xs {{ $isCurrentUser ? 'justify-end' : '' }} text-sm font-normal py-1 text-gray-900 dark:text-white">
                                {{ $comment->isi_komentar }}</p>

                        </div>
                    </li>
                @endforeach
            </div>

            <div>
                <form action="{{ route('comment.store') }}" method="POST">
                    @csrf
                    <div class="w-full flex bg-gray-50 dark:bg-gray-700 shadow">
                        <div class="w-full px-2 flex items-center bg-white dark:bg-gray-800">
                            <label for="comment" class="sr-only">Isi Komentar</label>
                            <textarea id="comment" rows="1"
                                class="w-full rounded text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                placeholder="Tulis komentar..." name="isi_komentar" required></textarea>
                        </div>
                        <div class="flex items-center justify-between px-3 py-2 text-end">
                            <button type="submit"
                                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                Kirim
                            </button>
                        </div>
                    </div>
                    <input type="hidden" value="{{ $topics->id }}" name="topic_id">
                </form>
            </div>

        </div>

    </div>
    <x-error-alert></x-error-alert>
    <x-success-alert></x-success-alert>
@endsection
