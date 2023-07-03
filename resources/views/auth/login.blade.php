<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login|Learning Management System</title>
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
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
            <img class="h-0 w-0 lg:w-full lg:h-full object-cover" src="{{ asset('assets/img/login-image.jpg') }}"
                alt="brand">
        </div>
        <div class="col-span-3">
            <div class="flex justify-center items-center mx-auto sm:h-screen lg:py-0">
                <div class="w-full dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col justify-center items-center pt-4">
                        <a href="#" class="flex items-center justify-between mr-4">
                            <img src="{{ asset('assets/img/stikom-logo.png') }}" class="mr-3 h-8" alt="STIKOM Logo" />
                            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">STIKOM 22
                                Januari</span>
                        </a>
                        <p class="text-sm font-bold">Learning Management System</p>
                    </div>
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1
                            class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Login
                        </h1>
                        <form class="space-y-4 md:space-y-6" action="#">
                            <div>
                                <label for="username"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                <input type="username" name="username" id="username"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="1920557016@stikom22j.com" required="true">
                            </div>
                            <div>
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required="true">
                            </div>
                            <div class="flex flex-col items-center gap-4">
                                <button type="submit"
                                    class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Login</button>

                                <button type="submit"
                                    class="w-full text-black bg-gray-200 shadow shadow-md hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Login
                                    sebagai tamu</button>
                        </form>
                    </div>
                    <div class="sign-up">
                        <a href="#"
                            class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Belum
                            punya akun?</a>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script src="{{ asset('js/darkmode.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>
</body>

</html>
