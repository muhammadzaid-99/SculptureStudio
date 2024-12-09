<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'The Sculpture Studio')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header class="header">
        <h1 class="logo">The Sculpture Studio</h1>
        <nav>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}" class="nav-item">Home</a></li>
                <li><a href="{{ route('services') }}" class="nav-item">Services</a></li>
                <li><a href="{{ route('about') }}" class="nav-item">About</a></li>
                <li><a href="{{ route('contact') }}" class="nav-item">Contact Us</a></li>
                <!-- <li><p id="darkModeToggle" class="nav-item dark-mode-btn">Dark Mode</p></li> -->
            </ul>
            <img class="hamburger" src="{{ asset('assets/icons/hamburger.svg') }}" alt="hamburger svg">
        </nav>
    </header>


    @yield('content')


    <footer class="footer">
        <p>&copy; 2024 The Sculpture Studio. All rights reserved.</p>
        <ul class="social-links">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Instagram</a></li>
            <li><a href="#">Twitter</a></li>
        </ul>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
