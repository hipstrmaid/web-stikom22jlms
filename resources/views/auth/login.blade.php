<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login|Learning Management System</title>
    {{-- <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script> --}}
    <script src="https://kit.fontawesome.com/6170d94faf.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Passion+One&family=Poppins:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="font-poppins bg-gray-100 dark:bg-gray-900">
    <section class="grid grid-cols-1 lg:grid-cols-8 flex w-full p-0">
        <div class="col-span-5">
            <img class="h-0 w-0 lg:w-full lg:h-full object-cover" src="{{ asset('assets/img/wide-1.jpeg') }}"
                alt="brand">
        </div>
        <div class="col-span-3">
            <div class="flex flex-col justify-center items-center mx-auto sm:h-screen lg:py-0 my-2">
                <img src="{{ asset('assets/img/stikom-logo.png') }}" class="mr-3 h-24" alt="STIKOM Logo" />
                <div class="w-full dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col justify-center items-center pt-4">
                        <a href="/" class="flex items-center justify-between mr-4">
                            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">STIKOM 22
                                Januari Kendari</span>
                        </a>
                        <p class="text-md font-bold">Learning Management System</p>
                    </div>
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1
                            class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Login
                        </h1>
                        <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST">
                            @csrf

                            <div>
                                <label for="username"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                <input type="text" id="username"
                                    class="@error('username') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm
                                rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="username" value="{{ old('username') }}" placeholder="1920557016@stikom22j.com"
                                    required="true">
                            </div>
                            <div>
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required="true">
                            </div>
                            @error('username')
                                <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        <span class="font-medium">{{ $message }}</span>
                                    </div>
                                </div>
                            @enderror
                            <div class="flex flex-col items-center gap-4">
                                <button type="submit"
                                    class="w-full text-white bg-brown-bg hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Login</button>

                                <a href="/guest"
                                    class="w-full text-black bg-gray-200 shadow shadow-md hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Login
                                    sebagai tamu</a>
                        </form>
                    </div>
                    {{-- <div class="sign-up">
                        <a href="#"
                            class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Belum
                            punya akun?</a>
                    </div> --}}
                </div>
            </div>
        </div>

    </section>

    <script src="{{ asset('js/darkmode.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>
</body>

</html>
