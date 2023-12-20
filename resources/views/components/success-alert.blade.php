@if (session('success'))
    {{-- <div id="alert"
        class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        <span class="font-medium">{{ session('success') }}</span>
    </div> --}}

    <div id="alert" class="fixed top-0 right-0 left-50 mx-auto z-50 p-4 animate-slide-down-from-top">
        <div class="bg-green-500 text-white font-semibold rounded-sm shadow-lg p-4">
            {{ session('success') }}
        </div>
    </div>
@endif
