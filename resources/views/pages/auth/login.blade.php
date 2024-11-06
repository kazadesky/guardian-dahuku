<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Darul Huda Kutacane</title>
    <link rel="shortcut icon" href="{{ asset('img/favicon.webp') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
    {{-- @vite(['resources/js/app.js', 'resources/css/app.css']) --}}
</head>

<body
    class="w-full flex items-center flex-col font-inter bg-gradient-to-tr from-elf-green to-hitam {{ request()->routeIs('login') ? 'overflow-hidden justify-center h-screen' : 'overflow-x-hidden min-h-screen max-md:pb-10' }}">

    @include('components.alert')

    <section
        class="faded-out w-full max-md:max-w-sm sm:max-w-md z-10 max-md:px-5 flex flex-col justify-center items-center h-screen overflow-hidden">
        <div class="w-full text-center">
            <h1 class="font-poppins text-3xl uppercase font-bold text-white">Login</h1>
            <p class="text-gray-200 text-sm capitalize mt-1">Sistem informasi pondok darul huda kutacane</p>
        </div>
        <form action="{{ route('login.process') }}" method="POST"
            class="w-full mt-2 rounded-lg shadow-lg p-5 border bg-white text-hitam max-md:text-sm">
            @csrf
            @if (session('error'))
                <section id="alert-danger"
                    class="w-full md:h-12 max-md:h-11 flex items-center px-3 bg-red-400 text-white mb-3">
                    <p>{{ session('error') }}</p>
                </section>
            @endif
            @csrf
            <div class="md:mb-4 max-md:mb-3">
                <label for="nis" class="block md:mb-2 max-md:mb-1 font-medium">NIS</label>
                <input type="nis" name="nis" id="nis"
                    class="outline-none w-full rounded-md h-12 px-3 border-2 transition duration-300 focus:border-green-500 focus:shadow-sm focus:ring-2 focus:ring-green-300 @error('nis') border-red-500 @enderror"
                    placeholder="123456" value="{{ old('nis') }}">
                @error('nis')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>
            <div class="md:mb-4 max-md:mb-3">
                <div class="flex items-center justify-between md:mb-2 max-md:mb-1">
                    <label for="password" class="block font-medium">Password</label>
                    <a href="" onclick="return false"
                        class="outline-none capitalize text-gray-600 md:text-sm max-md:text-xs underline underline-offset-2 active:text-elf-green focus:text-elf-green">lupa
                        password?</a>
                </div>
                <div class="relative w-full">
                    <input type="password" name="password" id="password"
                        class="outline-none w-full rounded-md md:h-12 max-md:h-11 pl-3 pr-12 border-2 transition duration-300 focus:border-green-500 focus:shadow-sm focus:ring-2 focus:ring-green-300 @error('password')
                            border-red-500
                        @enderror"
                        placeholder="******" value="{{ old('password') }}">
                    <button type="button" onclick="passwordShow(event)"
                        class="absolute md:top-[0.30rem] max-md:top-[0.20rem] md:right-2 max-md:right-[4px] text-gray-500 active:text-elf-green size-10 flex items-center justify-center outline-none focus:text-elf-green">
                        <span id="icon_pass" class="material-symbols-outlined max-md:text-[22px]">
                            visibility
                        </span>
                    </button>
                </div>
                @error('password')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>
            <section class="mt-2 flex flex-col items-center justify-center">
                <button type="submit"
                    class="w-full md:h-11 max-md:h-10 flex items-center justify-center uppercase font-medium bg-elf-green rounded-md shadow transition duration-300 text-white hover:bg-dark-elf focus:bg-dark-elf outline-none">login</button>
                </p>
            </section>
        </form>
    </section>

    <script src="{{ asset('js/main.js') }}"></script>
    @stack('script')
</body>

</html>
