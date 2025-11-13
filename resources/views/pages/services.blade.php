@extends('layouts.app')

@section('content')
    {{-- ====== HERO ====== --}}
    <section class="relative w-full h-[40vh] overflow-hidden">
        <img src="/img/services-hero.jpg" alt="Our Services" class="absolute inset-0 w-full h-full object-cover object-center">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="absolute inset-0 flex items-center">
            <div class="max-w-6xl mx-auto px-6">
                <h1 class="text-4xl md:text-5xl text-center font-bold text-white">Our Services</h1>
                <p class="mt-3 text-white/90 max-w-2xl">From strategy to delivery—we help you move faster, safer, and
                    smarter.</p>
            </div>
        </div>
    </section>

    {{-- ====== SERVICE CATEGORIES (cards) ====== --}}
    <section class="max-w-7xl mx-auto px-6 py-16">
        <h2 class="text-2xl md:text-3xl font-bold text-gold-dark">What We Do</h2>
        <p class="mt-2 text-gray-600 dark:text-gray-400">Flexible, outcome-driven services tailored to your business.</p>

        <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ([['icon' => '💡', 'title' => 'Consulting', 'desc' => 'Roadmaps, discovery, audits, and strategy workshops.'], ['icon' => '🧩', 'title' => 'Systems Integration', 'desc' => 'API design, third-party integration, automation.'], ['icon' => '🛠️', 'title' => 'Custom Development', 'desc' => 'Web apps, portals, dashboards, and internal tools.'], ['icon' => '🔐', 'title' => 'Security & Compliance', 'desc' => 'Hardening, SSO, RBAC, audit trails, best practices.'], ['icon' => '⚙️', 'title' => 'DevOps & Cloud', 'desc' => 'CI/CD, containerization, monitoring, cost optimization.'], ['icon' => '🧭', 'title' => 'Support & Maintenance', 'desc' => 'SLAs, bug fixes, performance tuning, on-call.']] as $s)
                <div
                    class="rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 p-6 hover:shadow-md transition">
                    <div class="text-4xl">{{ $s['icon'] }}</div>
                    <h3 class="mt-4 text-xl font-semibold text-gold-dark">{{ $s['title'] }}</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $s['desc'] }}</p>
                    <a href="#contact" class="mt-4 inline-block text-gold hover:text-gold-dark font-medium">Talk to us →</a>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ====== PROCESS (steps) ====== --}}
    <section class="bg-gray-50 dark:bg-gray-800 py-16">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-2xl md:text-3xl font-bold text-gold-dark">How We Work</h2>
            <div class="mt-8 grid md:grid-cols-4 gap-6">
                @foreach ([['step' => '01', 'title' => 'Discover', 'desc' => 'Understand goals, users, and constraints.'], ['step' => '02', 'title' => 'Design', 'desc' => 'Plan architecture, UX, and milestones.'], ['step' => '03', 'title' => 'Build', 'desc' => 'Iterate in sprints with demos & QA.'], ['step' => '04', 'title' => 'Launch', 'desc' => 'Handover, docs, training, and support.']] as $p)
                    <div class="p-6 rounded-xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700">
                        <span class="text-sm font-semibold text-gold">{{ $p['step'] }}</span>
                        <h3 class="mt-1 text-lg font-semibold">{{ $p['title'] }}</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $p['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====== PACKAGES / PRICING (optional) ====== --}}
    <section class="max-w-7xl mx-auto px-6 py-16">
        <h2 class="text-2xl md:text-3xl font-bold text-gold-dark">Packages</h2>
        <p class="mt-2 text-gray-600 dark:text-gray-400">Pick a starting point—custom scopes welcome.</p>

        <div class="mt-8 grid md:grid-cols-3 gap-6">
            @foreach ([['name' => 'Starter', 'price' => 'RM 4,900+', 'features' => ['2-week sprint', 'UX prototype', 'Basic integration', 'Email support']], ['name' => 'Growth', 'price' => 'RM 14,900+', 'features' => ['6-week delivery', 'Custom components', 'API integration', 'Priority support']], ['name' => 'Enterprise', 'price' => 'Custom', 'features' => ['Security review', 'SLA & on-call', 'Governance', 'Quarterly roadmap']]] as $pkg)
                <div
                    class="rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 p-6 flex flex-col">
                    <h3 class="text-xl font-semibold text-gold-dark">{{ $pkg['name'] }}</h3>
                    <p class="mt-2 text-2xl font-bold">{{ $pkg['price'] }}</p>
                    <ul class="mt-4 space-y-2 text-gray-600 dark:text-gray-400">
                        @foreach ($pkg['features'] as $f)
                            <li>• {{ $f }}</li>
                        @endforeach
                    </ul>
                    <a href="#contact"
                        class="mt-6 inline-block bg-gold hover:bg-gold-dark text-white font-medium px-4 py-2 rounded-md text-center">Get
                        quote</a>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ====== FAQ ====== --}}
    <section class="bg-gray-50 dark:bg-gray-800 py-16">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-2xl md:text-3xl font-bold text-gold-dark">FAQ</h2>
            <div class="mt-6 grid md:grid-cols-2 gap-6">
                @foreach ([['q' => 'How do we start?', 'a' => 'Book a free 30-min discovery call. We’ll propose scope, timeline, and budget.'], ['q' => 'Do you work with existing systems?', 'a' => 'Yes. We integrate with popular CRMs, ERPs, payment gateways, and internal APIs.'], ['q' => 'Do you offer maintenance?', 'a' => 'We provide SLAs, on-call, and monthly retainer options.'], ['q' => 'What tech stacks do you use?', 'a' => 'Laravel, Vue/React, Tailwind, Docker, AWS, and modern CI/CD tooling.']] as $faq)
                    <div class="rounded-xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 p-5">
                        <h3 class="font-semibold text-gold-dark">{{ $faq['q'] }}</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $faq['a'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====== CONTACT CTA ====== --}}
    <section id="contact" class="bg-gold-dark text-white py-16">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold">Ready to discuss your project?</h2>
            <p class="mt-2 text-white/90">Tell us your goals and we’ll propose the fastest path to value.</p>
            <a href="{{ route('contact-us') }}"
                class="mt-6 inline-block bg-white text-gold-dark font-semibold px-6 py-3 rounded-md hover:bg-gold-light hover:text-white transition">
                Contact Us
            </a>
        </div>
    </section>
@endsection
