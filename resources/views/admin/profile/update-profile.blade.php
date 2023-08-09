@extends('layouts.app')
@section('content')
    <x-content-title>Update Profile</x-content-title>
    {{ Breadcrumbs::render('adminProfile') }}
    <div class="row">
        <div class="grid grid-cols-1 mb-5">
            <ul class="flex bg-gray-200 dark:bg-gray-600">
                <div class="border border-gray-200 dark:border-gray-600 border-b-0 rounded-t">
                    <h5 class="text-sm text-gray-500 dark:text-white py-2 px-4 font-bold"><a
                            href="{{ route('admin.show', ['admin' => $admin->id]) }}">Profil</a>
                    </h5>
                </div>
                <div class="border bg-white border-gray-200 dark:border-gray-600  border-b-0 rounded-t dark:bg-gray-800">
                    <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold"><a
                            href="{{ route('admin.edit', ['admin' => $admin->id]) }}">Edit Profile</a>
                    </h5>
                </div>
            </ul>

            <div class="bg-white text-sm border border-gray-200 border-t-0 dark:border-gray-900 dark:bg-gray-800">
                <ul class="grid w-full gap-2 mb-4 p-5">
                    <form action="{{ route('admin.update', ['admin' => $admin->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('includes.profile._admin')
                    </form>

                </ul>

            </div>


        </div>


    </div>
@endsection
