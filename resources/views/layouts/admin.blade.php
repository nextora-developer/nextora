<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name', 'Admin'))</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Sidebar collapse */
        #sidebar.sidebar-expanded {
            /* width: 220px; */
            width: 270px;

        }

        #sidebar.sidebar-collapsed {
            width: 64px;
        }

        #sidebar.sidebar-collapsed .sidebar-label,
        #sidebar.sidebar-collapsed .sidebar-logo-text {
            display: none;
        }

        #sidebar.sidebar-collapsed .sidebar-logo-icon {
            margin-right: 0;
        }
    </style>
</head>

<body class="bg-[#f5f5f7] text-slate-900 antialiased">
    <div class="min-h-screen flex">
        {{-- Sidebar --}}
        <aside id="sidebar"
            class="sidebar-expanded bg-white border-r border-slate-200 flex flex-col transition-all duration-300 ease-in-out">
            {{-- Logo --}}
            <div class="h-16 flex items-center px-5 border-b border-slate-200">
                <div class="flex items-center">
                    <div
                        class="sidebar-logo-icon h-9 w-9 rounded-xl flex items-center justify-center bg-gold text-white font-bold text-lg">
                        MX
                    </div>
                    <div class="sidebar-logo-text ml-3 leading-tight">
                        <div class="text-[13px] font-semibold">
                            {{ config('app.name', 'Admin') }}
                        </div>
                        <div class="text-[11px] text-slate-500 uppercase tracking-[0.16em] font-bold">
                            Admin Panel
                        </div>
                    </div>
                </div>
            </div>

            {{-- Menu --}}
            <nav class="flex-1 overflow-y-auto py-4 text-sm">
                <div class="space-y-5">

                    {{-- MAIN SECTION --}}
                    <div>
                        <div class="px-4 font-bold pb-1 text-[11px] tracking-[0.18em] text-slate-400 uppercase">
                            Main
                        </div>

                        @php
                            $mainMenu = [
                                ['label' => 'Dashboard', 'route' => 'admin.dashboard', 'icon' => 'heroicon-o-home'],
                                [
                                    'label' => 'Services',
                                    'route' => 'admin.services.index',
                                    'icon' => 'heroicon-o-briefcase',
                                ],
                                ['label' => 'Orders', 'route' => null, 'icon' => 'heroicon-o-shopping-cart'],
                                ['label' => 'Category', 'route' => null, 'icon' => 'heroicon-o-tag'],
                                ['label' => 'Users', 'route' => null, 'icon' => 'heroicon-o-user-group'],
                                ['label' => 'Reports', 'route' => null, 'icon' => 'heroicon-o-chart-bar'],
                                ['label' => 'Payment', 'route' => null, 'icon' => 'heroicon-o-currency-dollar'],

                            ];

                        @endphp

                        <div class="mt-1 space-y-1">
                            @foreach ($mainMenu as $item)
                                @php
                                    $routeName =
                                        $item['route'] && Route::has($item['route']) ? route($item['route']) : '#';
                                    $isActive = $item['route'] && request()->routeIs($item['route'] . '*');
                                @endphp

                                <a href="{{ $routeName }}"
                                    class="group flex items-center gap-3 px-4 py-1.5 rounded-lg transition
                       {{ $isActive ? 'bg-gold/10 text-slate-900' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-md border text-[11px] font-semibold
                            {{ $isActive
                                ? 'bg-gold text-white border-gold'
                                : 'bg-white text-gold border-slate-200 group-hover:border-gold group-hover:bg-gold-light/20' }}">
                                        <x-dynamic-component :component="$item['icon']" class="w-4 h-4" />
                                    </div>

                                    <span class="sidebar-label text-[13px]">
                                        {{ $item['label'] }}
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    {{-- SETTINGS SECTION --}}
                    <div>
                        <div class="px-4 pb-1 font-bold text-[11px] tracking-[0.18em] text-slate-400 uppercase">
                            Settings
                        </div>

                        @php
                            $settingsMenu = [
                                [
                                    'label' => 'Configuration',
                                    'route' => null,
                                    'icon' => 'heroicon-o-wrench-screwdriver',
                                ],
                            ];
                        @endphp

                        <div class="mt-1 space-y-1">
                            @foreach ($settingsMenu as $item)
                                @php
                                    $routeName =
                                        $item['route'] && Route::has($item['route']) ? route($item['route']) : '#';
                                    $isActive = $item['route'] && request()->routeIs($item['route'] . '*');
                                @endphp

                                <a href="{{ $routeName }}"
                                    class="group flex items-center gap-3 px-4 py-1.5 rounded-lg transition
                       {{ $isActive ? 'bg-gold/10 text-slate-900' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-md border text-[11px] font-semibold
                            {{ $isActive
                                ? 'bg-gold text-white border-gold'
                                : 'bg-white text-gold border-slate-200 group-hover:border-gold group-hover:bg-gold-light/20' }}">
                                        <x-dynamic-component :component="$item['icon']" class="w-4 h-4" />
                                    </div>

                                    <span class="sidebar-label text-[13px]">
                                        {{ $item['label'] }}
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>
            </nav>



            {{-- Bottom user --}}
            <div class="border-t border-slate-200 p-4 text-xs text-slate-500">
                <div class="flex items-center">
                    <div
                        class="h-8 w-8 rounded-full bg-slate-100 flex items-center justify-center text-[11px] font-semibold text-gold">
                        A
                    </div>
                    <div class="sidebar-label ml-3">
                        <div class="text-[12px] font-medium text-slate-900">
                            Admin
                        </div>
                        <div class="text-[11px] text-slate-500">
                            {{ auth()->user()->email ?? 'admin@example.com' }}
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        {{-- Right side --}}
        <div class="flex-1 flex flex-col min-w-0">
            {{-- Top bar --}}
            <header
                class="h-16 flex items-center justify-between px-6 border-b border-slate-200 bg-white sticky top-0 z-20">
                <div class="flex items-center gap-3">
                    {{-- Sidebar toggle --}}
                    <button id="sidebarToggle"
                        class="inline-flex items-center justify-center h-9 w-9 rounded-lg border border-slate-200 hover:border-gold bg-white focus:outline-none">
                        <span class="sr-only">Toggle sidebar</span>

                        <span class="flex flex-col gap-1.5">
                            <span class="block h-0.5 w-6 bg-gold rounded"></span>
                            <span class="block h-0.5 w-6 bg-gold rounded"></span>
                            <span class="block h-0.5 w-6 bg-gold rounded"></span>
                        </span>
                    </button>


                    <div>
                        {{-- <div class="text-[11px] uppercase tracking-[0.18em] text-slate-400">
                            Admin
                        </div> --}}
                        <div class="text-sm font-semibold text-slate-900">
                            @yield('page_title', 'Dashboard')
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-3 text-xs">

                    {{-- <span class="hidden sm:inline text-slate-500">Today</span> --}}

                    {{-- SYSTEM STATUS --}}
                    {{-- <span
                        class="inline-flex items-center rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-[11px] text-slate-700">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 mr-2"></span>
                        System Online
                    </span> --}}

                    {{-- LOGOUT BUTTON --}}
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gold text-white
           text-sm font-medium hover:bg-gold-dark transition duration-150">

                            <x-heroicon-o-arrow-left-on-rectangle class="w-4 h-4" />

                            Logout
                        </button>
                    </form>
                </div>
            </header>

            {{-- Main content --}}
            <main class="flex-1 px-6 py-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        (function() {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('sidebarToggle');

            if (sidebar && toggleBtn) {
                toggleBtn.addEventListener('click', function() {
                    if (sidebar.classList.contains('sidebar-expanded')) {
                        sidebar.classList.remove('sidebar-expanded');
                        sidebar.classList.add('sidebar-collapsed');
                    } else {
                        sidebar.classList.remove('sidebar-collapsed');
                        sidebar.classList.add('sidebar-expanded');
                    }
                });
            }
        })();
    </script>
</body>

</html>
