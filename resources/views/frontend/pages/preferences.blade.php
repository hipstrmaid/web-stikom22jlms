@extends('layouts.app')
@section('content')
    <x-content-title>Preferences</x-content-title>
    {{ Breadcrumbs::render('settings') }}
    <div class="row">
        <div class="grid grid-cols-1 mb-5">
            <div class="bg-white text-sm border border-gray-200 border-t-0 dark:border-gray-900 dark:bg-gray-800">
                <ul class="grid w-full gap-2 mb-4 p-5">
                    <li>
                        <a class="font-medium text-gray-600 dark:text-gray-50 hover:underline"
                            href="{{ route('edit-profile') }}">Edit
                            Profile</a>
                    </li>
                    <li>
                        <a class="font-medium text-gray-600 dark:text-gray-50 hover:underline"
                            href="{{ route('user.editPassword', ['user' => Auth::user()->id]) }}">Ganti
                            Password</a>
                    </li>

                </ul>

            </div>


        </div>


    </div>
@endsection
