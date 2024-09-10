@extends('layouts.app')
@section('title', 'Tugas')

@section('content')
    <x-content-title>Submissions</x-content-title>
    {{ Breadcrumbs::render('tugas') }}
    <article class="bg-white dark:bg-gray-800 p-3">
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                data-tabs-toggle="#default-tab-content" role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">On Due</button>
                </li>
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                        aria-controls="dashboard" aria-selected="false">Overtime</button>
                </li>
            </ul>
        </div>

        <div id="default-tab-content">
            <div class="hidden p-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <ul>
                    {{-- On Due --}}
                    @foreach ($tugas as $tgs)
                        @if (Helper::Cparse($tgs->tgl_tenggat . ' ' . $tgs->waktu_tenggat) > now())
                            <a href="{{ route('tugas.show', ['tuga' => $tgs->id]) }}">
                                <li
                                    class="w-full px-2 py-1 mb-2 border border-gray-100 shadow dark:border-gray-600 dark:text-white">
                                    <div class="flex items-center">
                                        <i class="fas fa-clipboard-list fa-2x mr-2 text-blue-600"></i>
                                        <div>
                                            <div class="font-semibold hover:underline">
                                                {{ $tgs->judul_tugas }}</div>
                                            <span
                                                class="text-xs text-gray-500 dark:text-gray-400 items-center">{{ $tgs->pertemuan->judul_pertemuan }}
                                                - {{ $tgs->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </li>
                            </a>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="hidden p-4" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                <ul>
                    {{-- Overtime --}}
                    @foreach ($tugas as $tgs)
                        @if (Helper::Cparse($tgs->tgl_tenggat . ' ' . $tgs->waktu_tenggat) < now())
                            <a href="{{ route('tugas.show', ['tuga' => $tgs->id]) }}">
                                <li
                                    class="w-full px-2 py-1 mb-2 border border-gray-100 shadow dark:border-gray-600 dark:text-white">
                                    <div class="flex items-center">
                                        <i class="fas fa-clipboard-list fa-2x mr-2 text-red-600"></i>
                                        <div>
                                            <div class="font-semibold hover:underline">
                                                {{ $tgs->judul_tugas }}</div>
                                            <span
                                                class="text-xs text-gray-500 dark:text-gray-400">{{ $tgs->pertemuan->judul_pertemuan }}
                                                - {{ $tgs->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </li>

                            </a>
                        @endif
                    @endforeach
                </ul>

            </div>
        </div>
    </article>
@endsection
