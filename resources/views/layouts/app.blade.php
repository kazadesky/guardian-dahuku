<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Darul Huda Kutacane</title>
    <link rel="shortcut icon" href="{{ asset('img/favicon.webp') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="w-full h-screen overflow-hidden font-inter bg-background">
    @include('components.sidebar')
    <div class="w-full absolute top-0 left-0 h-48 bg-gradient-to-tr from-elf-green to-hitam"></div>

    <main id="content" class="relative z-10 w-full md:max-w-[80.5%] md:ml-[19.5%] h-full overflow-x-hidden px-5">
        @include('components.navbar')
        <section
            class="w-full min-h-screen pb-10 {{ request()->routeIs(['sa.dashboard', 'admin.dashboard', 'operator.dashboard', 'teacher.dashboard']) ? 'faded-out' : '' }}">
            @yield('content')
        </section>
        @include('components.footer')
    </main>

    <script src="{{ asset('js/main.js') }}"></script>
    @stack('script')
</body>

</html>
