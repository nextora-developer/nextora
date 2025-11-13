@extends('layouts.app')

@section('content')
    {{-- ====== HERO ====== --}}
    <section class="relative w-full h-[40vh] overflow-hidden">
        <img src="/img/careers-hero.jpg" alt="Join Our Team" class="absolute inset-0 w-full h-full object-cover object-center">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="absolute inset-0 flex items-center">
            <div class="max-w-6xl mx-auto px-6">
                <h1 class="text-4xl md:text-5xl text-center font-bold text-white">Join Our Team</h1>
                <p class="mt-3 text-white/90 max-w-2xl">
                    We're always looking for talented people who share our vision and values.
                </p>
            </div>
        </div>
    </section>

    {{-- ====== INTRO ====== --}}
    <section class="max-w-6xl mx-auto px-6 py-16 text-center">
        <h2 class="text-3xl font-bold text-gold-dark mb-6">Grow with Us</h2>
        <p class="max-w-3xl mx-auto text-gray-700 dark:text-gray-400 leading-relaxed">
            At <span class="text-gold-dark font-semibold">YourCompany</span>, we believe great people make great things
            happen.
            We offer an inclusive environment where you can grow your career, make an impact,
            and collaborate with innovative thinkers across disciplines.
        </p>
    </section>

    {{-- ====== WHY WORK WITH US ====== --}}
    <section class="bg-gray-50 dark:bg-gray-800 py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-gold-dark mb-10">Why Work With Us</h2>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach ([['icon' => '🌍', 'title' => 'Global Opportunities', 'desc' => 'Collaborate with clients and teams across borders.'], ['icon' => '💡', 'title' => 'Innovative Culture', 'desc' => 'We encourage creativity, growth, and continuous learning.'], ['icon' => '🤝', 'title' => 'Supportive Team', 'desc' => 'Join a community that values balance, inclusion, and integrity.']] as $w)
                    <div
                        class="bg-white dark:bg-gray-900 p-8 rounded-xl border border-gray-200 dark:border-gray-700 shadow hover:shadow-md transition">
                        <div class="text-5xl mb-4">{{ $w['icon'] }}</div>
                        <h3 class="text-xl font-semibold text-gold-dark mb-2">{{ $w['title'] }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">{{ $w['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====== OPEN POSITIONS ====== --}}
    <section class="max-w-7xl mx-auto px-6 py-20">
        <h2 class="text-2xl md:text-3xl font-bold text-gold-dark mb-6">Open Positions</h2>
        <p class="text-gray-600 dark:text-gray-400 mb-10">We’re hiring across departments. Browse openings below.</p>

        @php
            $jobs = [
                [
                    'title' => 'Frontend Developer',
                    'location' => 'Kuala Lumpur, Malaysia',
                    'type' => 'Full-time',
                    'desc' => 'Work with modern frameworks to create responsive, elegant interfaces.',
                ],
                [
                    'title' => 'Backend Engineer (Laravel)',
                    'location' => 'Remote / Malaysia',
                    'type' => 'Full-time',
                    'desc' => 'Build scalable APIs and manage cloud infrastructure.',
                ],
                [
                    'title' => 'UI/UX Designer',
                    'location' => 'Hybrid',
                    'type' => 'Contract',
                    'desc' => 'Design intuitive, beautiful, user-centered digital experiences.',
                ],
            ];
        @endphp

        <div class="space-y-6">
            @foreach ($jobs as $job)
                <div class="border border-gray-200 dark:border-gray-700 rounded-xl p-6 hover:shadow-md transition">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div>
                            <h3 class="text-xl font-semibold text-gold-dark">{{ $job['title'] }}</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">
                                {{ $job['location'] }} • {{ $job['type'] }}
                            </p>
                            <p class="mt-3 text-gray-700 dark:text-gray-400 max-w-2xl">{{ $job['desc'] }}</p>
                        </div>
                        <a href="#apply"
                            class="inline-flex items-center justify-center bg-gold hover:bg-gold-dark text-white font-medium px-6 py-2 rounded-md transition">
                            Apply Now
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ====== BENEFITS ====== --}}
    <section class="bg-gray-50 dark:bg-gray-800 py-16">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-gold-dark mb-10">Benefits & Perks</h2>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ([['icon' => '🏠', 'text' => 'Flexible remote work options'], ['icon' => '⏰', 'text' => 'Flexible hours & work-life balance'], ['icon' => '🎓', 'text' => 'Training and learning reimbursements'], ['icon' => '💰', 'text' => 'Performance bonuses and incentives'], ['icon' => '❤️', 'text' => 'Comprehensive health coverage'], ['icon' => '🌴', 'text' => 'Paid annual leave & wellness days']] as $b)
                    <div
                        class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl p-6 flex flex-col items-center">
                        <div class="text-3xl mb-3">{{ $b['icon'] }}</div>
                        <p class="text-gray-600 dark:text-gray-400">{{ $b['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====== APPLY SECTION ====== --}}
    <section id="apply" class="py-20 max-w-5xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-gold-dark mb-4">Apply Now</h2>
        <p class="text-gray-700 dark:text-gray-400 mb-8">Send us your CV and a short introduction — we’d love to hear from
            you.</p>
        <a href="mailto:hr@yourcompany.com"
            class="inline-block bg-gold hover:bg-gold-dark text-white font-semibold px-3 py-3 rounded-md transition">
            Email Your Resume
        </a>
    </section>

    {{-- ====== CTA FOOTER BANNER ====== --}}
    <section class="bg-gold-dark text-white py-16">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-4">Be Part of Our Journey</h2>
            <p class="text-white/90 mb-8 max-w-2xl mx-auto">If you’re driven by excellence and collaboration, there’s a
                place for you at YourCompany.</p>
            <a href="#apply"
                class="inline-block bg-white text-gold-dark font-semibold px-6 py-3 rounded-md hover:bg-gold-light hover:text-white transition">
                Join Us Today
            </a>
        </div>
    </section>
@endsection
