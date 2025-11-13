@extends('layouts.app')

@section('content')
    {{-- ====== HERO ====== --}}
    <section class="relative w-full h-[40vh] overflow-hidden">
        <img src="/img/contact-hero.jpg" alt="Contact Us" class="absolute inset-0 w-full h-full object-cover object-center">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="absolute inset-0 flex items-center">
            <div class="max-w-6xl mx-auto px-6">
                <h1 class="text-4xl md:text-5xl text-center font-bold text-white">Contact Us</h1>
                <p class="mt-3 text-white/90 max-w-2xl">
                    We’d love to hear from you — let’s start a conversation.
                </p>
            </div>
        </div>
    </section>

    {{-- ====== CONTACT SECTION ====== --}}
    {{-- ====== CONTACT SECTION ====== --}}
    <section class="max-w-7xl mx-auto px-6 py-20 space-y-12">

        {{-- MAP ON TOP --}}
        <div class="h-[400px] w-full rounded-2xl overflow-hidden shadow-sm">
            <iframe class="w-full h-full border-0"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.769206278905!2d101.690708!3d3.139003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc362fba0f3ad7%3A0xeaa94f12ad69a6f2!2sKuala%20Lumpur%20City%20Centre!5e0!3m2!1sen!2smy!4v00000000000"
                allowfullscreen="" loading="lazy"></iframe>
        </div>

        {{-- TWO CARDS BELOW --}}
        <div class="grid lg:grid-cols-2 gap-10">
            {{-- LEFT: Info card --}}
            <div
                class="bg-white dark:bg-gray-900 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-sm">
                <div class="p-8">
                    <h2 class="text-3xl font-bold text-gold-dark">Get in Touch</h2>
                    <p class="mt-3 text-gray-700 dark:text-gray-400">
                        Reach out anytime — our team typically replies within one business day.
                    </p>

                    <div class="mt-8 space-y-6 text-gray-700 dark:text-gray-400">
                        {{-- Email --}}
                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 7l9 6 9-6m-18 0v10a2 2 0 002 2h14a2 2 0 002-2V7" />
                            </svg>
                            <div>
                                <h4 class="font-semibold text-gold-dark">Email</h4>
                                <a href="mailto:info@yourcompany.com" class="hover:text-gold">info@yourcompany.com</a>
                            </div>
                        </div>

                        {{-- Phone --}}
                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75A2.25 2.25 0 014.5 4.5h1.15a2.25 2.25 0 012.1 1.46l1.05 2.8a2.25 2.25 0 01-.57 2.37l-1.02 1.02a15.5 15.5 0 006.78 6.78l1.02-1.02a2.25 2.25 0 012.37-.57l2.8 1.05a2.25 2.25 0 011.46 2.1V19.5a2.25 2.25 0 01-2.25 2.25h-1.5C8.177 21.75 2.25 15.823 2.25 8.25v-1.5z" />
                            </svg>
                            <div>
                                <h4 class="font-semibold text-gold-dark">Phone / WhatsApp</h4>
                                <a href="tel:+60123456789" class="hover:text-gold">+60 12-345 6789</a>
                                <div class="mt-2">
                                    <a href="https://wa.me/60123456789" target="_blank"
                                        class="inline-flex items-center gap-2 text-sm text-gold hover:text-gold-dark">
                                        <span class="inline-block w-2 h-2 rounded-full bg-gold"></span> Message on WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Address --}}
                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 21s-6.75-5.25-6.75-10.5A6.75 6.75 0 1118.75 10.5C18.75 15.75 12 21 12 21z" />
                            </svg>
                            <div>
                                <h4 class="font-semibold text-gold-dark">Address</h4>
                                <p>Level 10, Menara Business Center<br>Kuala Lumpur, Malaysia</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 rounded-lg border border-gray-200 dark:border-gray-700 p-4">
                        <h5 class="font-semibold text-gold-dark">Business Hours</h5>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Mon–Fri: 9:00–18:00 (GMT+8)</p>
                    </div>
                </div>
            </div>

            {{-- RIGHT: Form card --}}
            <div class="bg-white dark:bg-gray-900 rounded-2xl border border-gray-200 dark:border-gray-700 p-8 shadow-sm">
                <h2 class="text-3xl font-bold text-gold-dark mb-6">Send a Message</h2>

                <form action="{{ route('contact.send') }}" method="POST" class="space-y-5">
                    @csrf

                    {{-- Name --}}
                    <div>
                        <label for="name"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Name</label>
                        <input id="name" name="name" required
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-gold focus:border-gold">
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                        <input type="email" id="email" name="email" required
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-gold focus:border-gold">
                    </div>

                    {{-- Phone --}}
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Phone
                            Number</label>
                        <input type="tel" id="phone" name="phone"
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-gold focus:border-gold"
                            placeholder="+60 12-345 6789">
                    </div>

                    {{-- Message --}}
                    <div>
                        <label for="message"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Message</label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-gold focus:border-gold"></textarea>
                    </div>

                    {{-- Button --}}
                    <button type="submit"
                        class="w-full bg-gold hover:bg-gold-dark text-white font-semibold py-3 rounded-md transition">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>




    {{-- ====== CTA ====== --}}
    <section class="bg-gold-dark text-white py-16">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-4">Let’s Work Together</h2>
            <p class="text-white/90 mb-8">Ready to start your next project? Reach out and let’s make it happen.</p>
            <a href="mailto:info@yourcompany.com"
                class="inline-block bg-white text-gold-dark font-semibold px-6 py-3 rounded-md hover:bg-gold-light hover:text-white transition">
                Contact Us Today
            </a>
        </div>
    </section>
@endsection
