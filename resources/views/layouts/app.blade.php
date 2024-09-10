<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>STIKOM 22 J-LMS: @yield('title', 'Welcome')</title>
    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
    <script src="{{ asset('js/autodarkmode.js') }}"></script>
    <script src="https://kit.fontawesome.com/6170d94faf.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Passion+One&family=Poppins:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/video.css') }}">
    @yield('youtube-api')
</head>

<body class="flex flex-col justify-between h-screen font-poppins bg-gray-vanilla dark:bg-gray-900">
    @include('includes.header')
    @include('includes.sidebar')
    <main class="{{ isset($exclude_sidebar) && $exclude_sidebar ? 'ml-0 p-0' : 'md:ml-60 p-5' }}  overflow-auto grow">
        @yield('content')
    </main>

    @include('includes.footer')
    <script src="{{ asset('js/darkmode.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</body>

</html>
