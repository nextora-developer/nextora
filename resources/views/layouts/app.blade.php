<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name', 'Company') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100">

    <header class="fixed top-0 inset-x-0 z-50 bg-gold text-white shadow">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-6 h-14 relative">

            {{-- Left: Logo --}}
            <a href="{{ url('/') }}" class="font-semibold text-lg">YourCompany</a>

            {{-- Center: Nav --}}
            <nav class="absolute left-1/2 -translate-x-1/2 hidden md:flex gap-6">
                <a href="{{ route('home') }}" class="hover:text-gray-200">Home</a>
                <a href="{{ route('about') }}" class="hover:text-gray-200">About</a>
                <a href="{{ route('services') }}" class="hover:text-gray-200">Services</a>
                <a href="{{ route('careers') }}" class="hover:text-gray-200">Careers</a>
                <a href="{{ route('contact-us') }}" class="hover:text-gray-200">Contact Us</a>
            </nav>

            {{-- Right: Auth + Theme Toggle grouped together --}}
            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}" class="hover:text-gray-200 font-medium">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="hover:text-gray-200 font-medium">Login</a>
                @endauth

                <button id="theme-toggle"
                    class="inline-flex items-center justify-center w-9 h-9 rounded-md border border-white/30 hover:bg-white/10 transition"
                    aria-label="Toggle dark mode">
                    {{-- Sun (for dark mode) --}}
                    <svg id="icon-sun" class="hidden" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 3v2m0 14v2m9-9h-2M5 12H3m14.95 6.95-1.41-1.41M7.46 7.46 6.05 6.05m11.31 0-1.41 1.41M7.46 16.54 6.05 17.95M12 8a4 4 0 100 8 4 4 0 000-8z" />
                    </svg>
                    {{-- Moon (for light mode) --}}
                    <svg id="icon-moon" class="hidden" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
                    </svg>
                </button>
            </div>
        </div>
    </header>


    {{-- Main content with offset for fixed header --}}
    <main class="pt-14 min-h-screen">
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="border-t border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-6 py-8 text-sm text-gray-600 dark:text-gray-400 flex justify-between">
            <p>© {{ date('Y') }} YourCompany. All rights reserved.</p>
            <div class="flex gap-4">
                <a href="#" class="hover:text-gold">Privacy Policy</a>
                <a href="#" class="hover:text-gold">Terms</a>
            </div>
        </div>
    </footer>
</body>

</html>
