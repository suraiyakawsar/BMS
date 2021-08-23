<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BMS</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-white fixed z-10 top-0 flex items-center justify-between px-20 py-3 mx-auto w-full">
            <div class="flex items-center">
                <div>
                    <a href="{{ url('/') }}"
                        class="text-4xl font-serif text-yellow-700 inline-flex items-center mr-8">
                        BMS
                    </a>
                </div>

                <nav class="flex items-center space-x-8 lg:flex">
                    <a class="bg-white inline-block rounded-t py-2 px-4 text-yellow-700 font-semibold hover:underline hover:bg-yellow-500 hover:text-white"
                        href="/">
                        Home
                    </a>
                    <a class="bg-white inline-block rounded-t py-2 px-4 text-yellow-700 font-semibold hover:underline hover:bg-yellow-500 hover:text-white"
                        href="/blog">
                        Blog
                    </a>
                </nav>
            </div>

            <div class="flex items-center space-x-8 lg:flex">

                @guest
                    <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>

                    @if (Route::has('register'))
                        <a class="inline-flex items-center justify-center h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-yellow-800 hover:bg-yellow-700 focus:shadow-outline focus:outline-none"
                            href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a>
                    @endif
                @else
                    <span class="text-yellow-700">
                        {{ Auth::user()->name }}
                    </span>

                    <a href="{{ route('logout') }}"
                        class="inline-flex items-center justify-center h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-yellow-800 hover:bg-yellow-700 focus:shadow-outline focus:outline-none"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                @endguest
            </div>
        </header>

        <div>
            @yield('content')
        </div>
        <div>
            @include('layouts.footer')
        </div>
    </div>
</body>

</html>
