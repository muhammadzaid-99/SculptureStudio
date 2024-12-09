<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'The Sculpture Studio')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased min-h-screen">
    <div class="min-h-screen bg-gray-100">
        <header class="header">
            <h1 class="logo">The Sculpture Studio <span style="color: rgb(150, 150, 255);">Dashbord</span></h1>
            <nav>
                <div class="flex items-center space-x-4">
                    <!-- User Name -->
                    <span class="text-gray-500 font-medium">{{ Auth::user()->name }}</span>

                    <!-- Logout Button -->
                    <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="px-4 py-2 text-red-200 rounded-md text-sm">
                        {{ __('Log Out') }}
                    </button>

                    <!-- Hidden Logout Form -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>


                <img class="hamburger" src="{{ asset('assets/icons/hamburger.svg') }}" alt="hamburger svg">
            </nav>
        </header>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>