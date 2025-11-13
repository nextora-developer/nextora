@extends('layouts.app')
@section('content')
    {{-- =============== ABOUT SPLIT SECTION =============== --}}
    <section class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-12 items-center">
        <div class="order-2 md:order-1">
            <h2 class="text-3xl font-bold mb-4 text-gold-dark">About Our Company</h2>
            <p class="text-gray-700 mb-4 leading-relaxed">
                We deliver customized business solutions that transform ideas into tangible results.
                From consultation to implementation, we work closely with clients to exceed expectations.
            </p>
            <p class="text-gray-700 mb-6">
                Our mission is to empower businesses through technology, innovation, and trust.
            </p>
            <a href="{{ route('about') }}"
                class="inline-block bg-gold-light hover:bg-gold-dark text-white font-semibold px-6 py-2 rounded-md">
                Learn More
            </a>
        </div>

        <div class="order-1 md:order-2">
            <img src="/img/about.jpg" alt="About our company" class="rounded-xl shadow-lg object-cover w-full h-[400px]">
        </div>
    </section>

    {{-- =============== INDUSTRIES / CLIENTS LOGOS =============== --}}
    <section class="bg-gray-50 dark:bg-gray-800 py-16">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-2xl font-semibold mb-8 text-gold-dark">Trusted by Leading Brands</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-8 items-center opacity-80">
                @foreach (['/img/client1.png', '/img/client2.png', '/img/client3.png', '/img/client4.png', '/img/client5.png'] as $logo)
                    <img src="{{ $logo }}"
                        class="mx-auto h-12 object-contain grayscale hover:grayscale-0 transition" alt="Client Logo">
                @endforeach
            </div>
        </div>
    </section>

    {{-- =============== TESTIMONIALS =============== --}}
    <section class="max-w-6xl mx-auto px-6 py-20 text-center">
        <h2 class="text-3xl font-bold text-gold-dark mb-10">What Our Clients Say</h2>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach ([['name' => 'Emily Wong', 'text' => 'They delivered exceptional results and great communication throughout.'], ['name' => 'Daniel Lim', 'text' => 'Professional, efficient, and truly understand our business needs.'], ['name' => 'Sarah Tan', 'text' => 'Their team went above and beyond our expectations. Highly recommended!']] as $t)
                <div class="bg-white dark:bg-gray-900 p-6 rounded-xl shadow hover:shadow-md transition">
                    <p class="text-gray-600 italic mb-4">“{{ $t['text'] }}”</p>
                    <h4 class="text-gold-dark font-semibold">{{ $t['name'] }}</h4>
                </div>
            @endforeach
        </div>
    </section>

    {{-- =============== CTA CONTACT BANNER =============== --}}
    <section class="bg-gold-dark text-white py-20">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-4">Have a Project in Mind?</h2>
            <p class="text-white/90 mb-8">Let’s discuss how we can work together to achieve your goals.</p>
            <a href="{{ route('contact-us') }}"
                class="inline-block bg-white text-gold-dark font-semibold px-6 py-3 rounded-md hover:bg-gold-light hover:text-white transition">
                Get in Touch
            </a>
        </div>
    </section>
@endsection
