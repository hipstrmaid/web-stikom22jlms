@extends('layouts.app')
@section('content')
    <x-content-title>Preferences</x-content-title>
    {{ Breadcrumbs::render('settings') }}
    <x-panel.panel-body>
        <div class="grid grid-cols-1">
            <ul class="grid w-full gap-2">
                <x-panel.panel-body>
                    <li>
                        <a class="font-medium text-gray-600 dark:text-gray-50 hover:underline"
                            href="{{ route('edit-profile') }}">Edit
                            Profile</a>
                    </li>
                </x-panel.panel-body>
                <x-panel.panel-body>
                    <li>
                        <a class="font-medium text-gray-600 dark:text-gray-50 hover:underline"
                            href="{{ route('user.editPassword', ['user' => Auth::user()->id]) }}">Ganti
                            Password</a>
                    </li>
                </x-panel.panel-body>
            </ul>
        </div>
    </x-panel.panel-body>
@endsection
