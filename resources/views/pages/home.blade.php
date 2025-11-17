@extends('layouts.app')

@section('content')
    {{-- =============== HERO =============== --}}
    <section class="relative w-full h-[70vh] overflow-hidden">
        <picture>
            <source srcset="/img/hero-mobile.webp" type="image/webp" media="(max-width: 640px)">
            <source srcset="/img/hero.png" type="image/png">
            <img src="/img/hero.png" alt="Corporate Banner" class="absolute inset-0 w-full h-full object-cover object-center" draggable="false" oncontextmenu="return false;">
        </picture>
        <div class="absolute inset-0 bg-black/40"></div>

        <div class="absolute inset-0 flex items-center">
            <div class="w-full max-w-6xl mx-auto px-6 md:px-12 lg:px-20 text-left">
                <h1 class="text-4xl md:text-6xl font-bold text-white leading-tight">
                    Building Your Future
                </h1>
                <p class="mt-4 text-white/90 max-w-md">
                    Innovative solutions for a better tomorrow.
                </p>
                <a href="{{ route('services') }}"
                    class="mt-6 inline-block bg-gold-light hover:bg-gold-dark text-white font-medium px-6 py-2 rounded-md">
                    Explore Services
                </a>
            </div>
        </div>
    </section>

    {{-- =============== ABOUT COMPANY =============== --}}
    <section class="max-w-6xl mx-auto px-6 py-20 text-center">
        <h2 class="text-3xl font-bold mb-6 text-gold-dark">Who We Are</h2>
        <p class="max-w-3xl mx-auto text-gray-700 leading-relaxed">
            We are a forward-thinking company specializing in innovative, high-quality business solutions.
            With years of experience and a team of passionate experts, we deliver results that make an impact.
        </p>
    </section>

    {{-- =============== SERVICES / FEATURES =============== --}}
    <section class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-3 gap-8">
        @foreach ([['icon' => '💼', 'title' => 'Consulting', 'text' => 'We provide expert advice to help you strategize and grow.'], ['icon' => '🛠️', 'title' => 'Development', 'text' => 'From concept to launch, we build it for you.'], ['icon' => '🔒', 'title' => 'Support', 'text' => 'Reliable, long-term support and maintenance.']] as $item)
            <div class="border border-gray-200 rounded-xl p-8 hover:shadow-lg transition text-center">
                <div class="text-5xl mb-4">{{ $item['icon'] }}</div>
                <h3 class="text-xl font-semibold mb-2 text-gold-dark">{{ $item['title'] }}</h3>
                <p class="text-gray-600">{{ $item['text'] }}</p>
            </div>
        @endforeach
    </section>

    {{-- =============== WHY CHOOSE US =============== --}}
    <section class="bg-gray-50 dark:bg-gray-800 py-20">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-6 text-gold-dark">Why Choose Us</h2>
            <div class="grid md:grid-cols-3 gap-8 mt-10">
                @foreach ([['title' => 'Proven Expertise', 'desc' => 'Our team has over a decade of experience across industries.'], ['title' => 'Innovative Solutions', 'desc' => 'We use modern technologies to give you a competitive edge.'], ['title' => 'Client-Centric Approach', 'desc' => 'Your success is our top priority at every stage.']] as $item)
                    <div class="p-6 bg-white dark:bg-gray-900 rounded-lg shadow hover:shadow-md transition">
                        <h3 class="text-xl font-semibold mb-2 text-gold-dark">{{ $item['title'] }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- =============== TEAM PREVIEW =============== --}}
    <section class="max-w-7xl mx-auto px-6 py-20 text-center">
        <h2 class="text-3xl font-bold mb-10 text-gold-dark">Meet Our Team</h2>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-10">
            @foreach ([['name' => 'Alex Tan', 'role' => 'Chief Executive Officer', 'img' => '/img/team1.jpg'], ['name' => 'Rachel Lee', 'role' => 'Head of Operations', 'img' => '/img/team2.jpg'], ['name' => 'Jason Lim', 'role' => 'Lead Developer', 'img' => '/img/team3.jpg']] as $member)
                <div class="rounded-xl overflow-hidden shadow hover:shadow-lg transition bg-white dark:bg-gray-900">
                    <img src="{{ $member['img'] }}" alt="{{ $member['name'] }}" class="w-full h-64 object-cover">
                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-gold-dark">{{ $member['name'] }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $member['role'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- =============== CTA BANNER =============== --}}
    <section class="bg-gold-dark text-white py-20">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-4">Let’s Build Something Great Together</h2>
            <p class="text-white/90 mb-8">Ready to take your business to the next level? Reach out to our team today.</p>
            <a href="{{ route('contact-us') }}"
                class="inline-block bg-white text-gold-dark font-semibold px-6 py-3 rounded-md hover:bg-gold-light hover:text-white transition">
                Contact Us
            </a>
        </div>
    </section>
@endsection
