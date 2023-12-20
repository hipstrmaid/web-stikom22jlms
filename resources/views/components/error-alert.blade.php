@if (session('error'))
    {{-- <div id="alert" class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        <span class="font-medium">{{ session('error') }}</span>
    </div> --}}

    <div id="alert" class="fixed top-10 right-0 left-50 mx-auto z-50 pt-10 mr-5 animate-slide-down-from-top">
        <div class="bg-red-500 text-white font-semibold rounded-sm shadow-lg p-3">
            {{ session('error') }}
        </div>
    </div>
@endif
