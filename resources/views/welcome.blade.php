<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'MX888') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
        </style>
    @endif
</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <header
        class="fixed top-0 left-0 w-full bg-white/70 dark:bg-black/70 backdrop-blur-md border-b border-gray-200 dark:border-gray-800 z-50">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-end gap-4">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        Register
                    </a>
                @endif
            @endauth

            {{-- 🌗 Theme Toggle Button --}}
            <button id="theme-toggle"
                class="px-3 py-1.5 border border-[#19140035] dark:border-[#3E3E3A] rounded-sm text-sm leading-normal text-[#1b1b18] dark:text-[#EDEDEC] hover:border-[#1915014a] dark:hover:border-[#62605b] transition"
                title="Toggle theme">
                <span id="theme-toggle-icon">🌙</span>
            </button>
        </div>

        {{-- 🌙 Theme toggle script --}}
        <script>
            const html = document.documentElement;
            const themeToggle = document.getElementById('theme-toggle');
            const themeIcon = document.getElementById('theme-toggle-icon');

            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark') {
                html.classList.add('dark');
                themeIcon.textContent = '🌞';
            }

            themeToggle.addEventListener('click', () => {
                html.classList.toggle('dark');
                const isDark = html.classList.contains('dark');
                localStorage.setItem('theme', isDark ? 'dark' : 'light');
                themeIcon.textContent = isDark ? '🌞' : '🌙';
            });
        </script>
    </header>




    <section class="pt-24 flex flex-col items-center justify-center text-center min-h-[70vh] px-4">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-gray-100 mb-4">
            Welcome to <span class="text-gold dark:text-gold-light">MX888</span>
        </h1>

        <p class="text-gray-600 dark:text-gray-400 max-w-lg mb-6">
            A modern Laravel application starter built with authentication, responsive design, and theme switching.
        </p>

        <div class="flex gap-4">
            <a href="{{ route('login') }}"
                class="px-6 py-2 bg-gold text-black font-medium rounded-md hover:bg-gold-dark transition">
                Log In
            </a>
            <a href="{{ route('register') }}"
                class="px-6 py-2 border border-gold text-gold rounded-md hover:bg-gold/10 dark:hover:bg-gold-dark/20 transition">
                Register
            </a>
        </div>
    </section>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

{{-- 🌙 Theme toggle script --}}
<script>
    const html = document.documentElement;
    const themeToggle = document.getElementById('theme-toggle');
    const themeIcon = document.getElementById('theme-toggle-icon');

    // Load saved theme
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        html.classList.add('dark');
        themeIcon.textContent = '🌞';
    }

    themeToggle.addEventListener('click', () => {
        html.classList.toggle('dark');
        const isDark = html.classList.contains('dark');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
        themeIcon.textContent = isDark ? '🌞' : '🌙';
    });
</script>

</html>
