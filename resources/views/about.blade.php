@extends('layouts.app')
@section('title', 'About Nivritti | Our story and approach')
@section('content')
<section class="overflow-hidden bg-ivory">
    <div class="mx-auto grid max-w-7xl gap-8 px-5 pb-10 pt-28 sm:px-6 md:pb-12 lg:min-h-[600px] lg:grid-cols-[1.02fr_.98fr] lg:items-center lg:gap-12 lg:px-8 lg:pb-14">
        <div class="reveal">
            <x-section-label label="Our story" />
            <h1 class="serif mt-5 max-w-3xl text-5xl leading-[1.05] tracking-tight text-ink sm:text-2xl lg:text-7xl">Rooted in craft.<br><em class="font-normal text-brass-deep">Made for living.</em></h1>
            <p class="mt-6 max-w-xl text-base leading-8 text-muted">Nivritti brings skilled garment makers, quality fabrics and thoughtful design together to create clothing made with care.</p>
            <p class="mt-4 max-w-xl text-base leading-8 text-muted">From material selection to the final stitch, our team focuses on comfort, dependable quality and the people behind every piece.</p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="/catalog" class="inline-flex items-center gap-3 rounded-sm bg-ink px-7 py-4 text-sm font-semibold text-brass-light transition hover:bg-gradient-to-r from-[#D99A16] via-[#E8B52F] to-[#D49A16] hover:text-ink">Explore the collection <x-icon name="arrow-up-right" class="anim-cta-arrow h-4 w-4" /></a>
                <a href="/contact" class="inline-flex items-center gap-3 rounded-full border border-ink/20 px-7 py-4 text-sm font-semibold text-ink transition hover:border-brass hover:bg-sand">Talk with our team</a>
            </div>
        </div>
        <div class="image-zoom reveal relative h-[380px] overflow-hidden rounded-[2rem] bg-sand sm:h-[500px] lg:h-[560px]">
            <img src="{{ asset('images/about/about-hero.jpg') }}" alt="Nivritti garment makers sewing colorful clothing in the workshop" class="h-full w-full object-cover" fetchpriority="high">
            <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-ink/30 via-transparent to-transparent" aria-hidden="true"></div>
            <p class="absolute bottom-5 left-5 rounded-full border border-ivory/35 bg-ink/70 px-4 py-2 text-xs font-medium tracking-wide text-ivory backdrop-blur-sm sm:bottom-7 sm:left-7">Thoughtful textiles · Nivritti</p>
        </div>
    </div>
</section>
<section class="bg-sand px-5 py-8 sm:px-6 md:py-10 lg:px-8 lg:py-12" aria-labelledby="about-principles-title">
    <div class="mx-auto max-w-7xl">
        <div class="reveal max-w-3xl">
            <x-section-label label="What guides our work" />
            <h2 id="about-principles-title" class="serif mt-4 text-4xl text-ink sm:text-2xl">Care in every choice.</h2>
            <p class="mt-5 max-w-2xl text-base leading-8 text-muted">From the first fibre to the final finish, we bring the same care to our materials, our partnerships and the pieces we make together.</p>
        </div>
        <div class="mt-9 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach([
            ['01', 'Materials with purpose', 'We choose fibres and constructions for their feel, function and lasting usefulness.'],
            ['02', 'People at every stage', 'We value the knowledge of makers and build strong relationships through shared work.'],
            ['03', 'Quality that lasts', 'Careful checks and considered finishing help every piece meet the standard we set.'],
            ] as $principle)
            <article class="reveal rounded-lg border border-ink/10 bg-ivory p-6 sm:p-7">
                <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-gradient-to-r from-[#D99A16] via-[#E8B52F] to-[#D49A16] text-xs font-semibold tracking-[.16em] text-white">{{ $principle[0] }}</span>
                <h3 class="serif mt-7 text-2xl text-ink">{{ $principle[1] }}</h3>
                <p class="mt-3 text-sm leading-6 text-muted">{{ $principle[2] }}</p>
            </article>
            @endforeach
        </div>
    </div>
</section>
<!-- <section class="bg-ink px-5 py-8 text-ivory sm:px-6 lg:px-8 lg:py-12">
    <div class="mx-auto grid max-w-7xl gap-8 md:grid-cols-2 lg:px-4">
        <div class="reveal">
            <x-section-label label="Our mission" variant="inverse" />
            <h2 class="serif mt-4 text-4xl">Make with intention.</h2>
            <p class="mt-5 max-w-lg text-base leading-8 text-ivory/75">We make textiles that respect their material, serve their purpose and honour the knowledge of the people who create them.</p>
        </div>
        <div class="reveal border-t border-ivory/20 pt-8 md:border-l md:border-t-0 md:pl-10 md:pt-0">
            <x-section-label label="Our vision" variant="inverse" />
            <h2 class="serif mt-4 text-4xl">A more thoughtful industry.</h2>
            <p class="mt-5 max-w-lg text-base leading-8 text-ivory/75">We believe a better future for textiles is built through lasting relationships, informed choices and a commitment to keep learning.</p>
        </div>
    </div>
</section> -->
<section class="bg-ivory px-5 py-8 sm:px-6 lg:px-8 lg:py-12">
    <div class="mx-auto max-w-7xl">
        <div class="reveal max-w-3xl">
            <x-section-label label="Our approach" />
            <h2 class="serif mt-4 text-4xl text-ink sm:text-2xl">Excellence lives in the process.</h2>
        </div>
        <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">@foreach([['01','Material knowledge','We learn the nature of a fibre before asking it to become something new.'],['02','Thoughtful design','Utility, comfort and lasting character guide each design decision.'],['03','Skilled making','Our partnerships recognise skill and encourage shared learning.'],['04','Quality, always','Attention at every stage lets the final details feel effortless.']] as $step)<article class="reveal rounded-lg border border-ink/10 bg-sand p-6"><span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-gradient-to-r from-[#D99A16] via-[#E8B52F] to-[#D49A16] text-xs font-semibold text-white">{{ $step[0] }}</span>
                <h3 class="serif mt-5 text-2xl text-ink">{{ $step[1] }}</h3>
                <p class="mt-3 text-base leading-7 text-muted">{{ $step[2] }}</p>
            </article>@endforeach</div>
    </div>
</section>
<section class="grid bg-sand lg:grid-cols-2">
    <div class="image-zoom min-h-[360px] overflow-hidden lg:min-h-[460px]"><img src="{{ asset('images/hero/hero-bg3.jpg') }}" alt="Fabric maker at work" class="h-full w-full object-cover" loading="lazy"></div>
    <div class="reveal flex items-center px-5 py-8 sm:px-10 lg:px-14">
        <div>
            <x-section-label label="Quality & responsibility" />
            <h2 class="serif mt-4 text-4xl text-ink">Better choices, made every day.</h2>
            <p class="mt-5 text-base leading-6 text-muted">We keep improving how we source, sample and produce. Our commitment is practical: ask better questions, make considered choices and work with partners who share our care for quality.</p><a href="/contact" class="mt-7 inline-flex items-center gap-2 rounded-sm bg-ink px-6 py-3.5 text-sm font-semibold text-brass-light">Talk to our team <x-icon name="arrow-up-right" class="anim-cta-arrow h-4 w-4" /></a>
        </div>
    </div>
</section>
<section class="bg-ivory px-5 py-8 text-center sm:px-6 lg:px-8 lg:py-12">
    <div class="reveal mx-auto max-w-3xl">
        <x-section-label label="Work with us" />
        <h2 class="serif mt-4 text-4xl text-ink sm:text-2xl">Good work starts with a conversation.</h2><a href="/contact" class="mt-7 inline-flex items-center gap-3 rounded-sm bg-ink px-7 py-4 text-sm font-semibold text-brass-light transition hover:bg-gradient-to-r from-[#D99A16] via-[#E8B52F] to-[#D49A16] hover:text-ink">Get in touch <x-icon name="arrow-up-right" class="anim-cta-arrow h-4 w-4" /></a>
    </div>
</section>


{{-- Premium Nivritti Footer --}}
<footer class="relative overflow-hidden bg-[#FFF8E7] text-[#102840]">

    {{-- Decorative Botanical Background --}}
    <div class="pointer-events-none absolute inset-0 overflow-hidden" aria-hidden="true">
        <x-decorative-botanical
            variant="flower"
            class="absolute -left-16 bottom-0 h-[420px] w-[300px] text-[#D4A62A]/35 opacity-60"
        />

        <x-decorative-botanical
            variant="flower"
            class="absolute -right-20 top-0 h-[360px] w-[280px] rotate-12 text-[#D4A62A]/30 opacity-60"
        />

        <x-decorative-botanical
            variant="leaf"
            class="absolute -right-24 bottom-10 h-[300px] w-[260px] text-[#D4A62A]/20 opacity-50"
        />
    </div>


    {{-- Newsletter / CTA --}}
    <div class="relative z-10 px-5 pt-6 sm:px-6 lg:px-8 lg:pt-8">
        <div
            class="mx-auto flex max-w-7xl flex-col gap-7 rounded-[1.5rem] border border-[#D4A62A]/35 bg-[#FFF1C9]/70 px-6 py-7 sm:px-10 lg:flex-row lg:items-center lg:justify-between lg:px-12 lg:py-8"
        >

            {{-- Newsletter Content --}}
            <div class="flex items-center gap-5">

                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full border bg-brass text-white"
                >
                    <x-icon name="mail" class="h-5 w-5" />
                </div>

                <div>
                    <h3 class="serif text-xl leading-tight text-[#102840] sm:text-2xl">
                        Let's make something beautiful.
                    </h3>

                    <p class="mt-1 text-xs text-[#5F6670] sm:text-sm">
                        Get updates on new collections, stories and more.
                    </p>
                </div>

            </div>


            {{-- Newsletter Form --}}
            <form
                action="#"
                method="POST"
                class="flex w-full max-w-2xl items-center overflow-hidden rounded-full border border-[#CFC7B5] bg-white p-1.5 shadow-sm"
            >
                @csrf

                <label for="footer-email" class="sr-only">
                    Email address
                </label>

                <input
                    id="footer-email"
                    type="email"
                    name="email"
                    placeholder="Enter your email address"
                    class="min-w-0 flex-1 bg-transparent px-5 py-3 text-sm text-[#102840] outline-none placeholder:text-[#8A8F96]"
                    required
                >

                <button
                    type="submit"
                    class="shrink-0 rounded-full bg-[#D4A62A] px-6 py-3 text-sm font-semibold text-[#102840] transition duration-300 hover:bg-[#B88716] hover:text-white"
                >
                    Subscribe
                </button>
            </form>

        </div>
    </div>


    {{-- Main Footer --}}
    <div class="relative z-10 mx-auto max-w-7xl px-5 pb-7 pt-14 sm:px-6 lg:px-8 lg:pt-16">

        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-[1.5fr_.9fr_.9fr_1.2fr] lg:gap-14">

            {{-- Brand --}}
            <div class="reveal">

                <a
                    href="/"
                    class="inline-block"
                    aria-label="Nivritti Home"
                >
                    <img
                        src="{{ asset('images/logo/logo.png') }}"
                        alt="Nivritti"
                        class="h-14 w-auto object-contain"
                    >
                </a>

                <p class="mt-5 max-w-sm text-sm leading-7 text-[#5F6670]">
                    Thoughtful textiles, timeless designs. Crafted with care,
                    inspired by tradition and made for modern living.
                </p>


                {{-- Social Icons --}}
                <div class="mt-7 flex items-center gap-3">

                    <a
                        href="#"
                        aria-label="Instagram"
                        class="flex h-11 w-11 items-center justify-center rounded-full border border-[#D4A62A]/50 text-[#5A3C12] transition duration-300 hover:-translate-y-1 hover:bg-[#D4A62A] hover:text-white"
                    >
                        <x-icon name="instagram" class="h-5 w-5" />
                    </a>

                    <a
                        href="#"
                        aria-label="Facebook"
                        class="flex h-11 w-11 items-center justify-center rounded-full border border-[#D4A62A]/50 text-[#5A3C12] transition duration-300 hover:-translate-y-1 hover:bg-[#D4A62A] hover:text-white"
                    >
                        <x-icon name="facebook" class="h-5 w-5" />
                    </a>

                    <a
                        href="#"
                        aria-label="YouTube"
                        class="flex h-11 w-11 items-center justify-center rounded-full border border-[#D4A62A]/50 text-[#5A3C12] transition duration-300 hover:-translate-y-1 hover:bg-[#D4A62A] hover:text-white"
                    >
                        <x-icon name="youtube" class="h-5 w-5" />
                    </a>

                    <a
                        href="#"
                        aria-label="LinkedIn"
                        class="flex h-11 w-11 items-center justify-center rounded-full border border-[#D4A62A]/50 text-[#5A3C12] transition duration-300 hover:-translate-y-1 hover:bg-[#D4A62A] hover:text-white"
                    >
                        <x-icon name="linkedin" class="h-5 w-5" />
                    </a>

                </div>

            </div>


            {{-- Quick Links --}}
            <div class="reveal">

                <h4 class="text-xs font-bold uppercase tracking-[.24em] text-[#5A3C12]">
                    Quick Links
                </h4>

                <nav class="mt-6 flex flex-col gap-4">

                    <a href="/" class="text-sm text-[#5F6670] transition hover:translate-x-1 hover:text-[#B88716]">
                        Home
                    </a>

                    <a href="/about" class="text-sm text-[#5F6670] transition hover:translate-x-1 hover:text-[#B88716]">
                        About Us
                    </a>

                    <a href="/catalog" class="text-sm text-[#5F6670] transition hover:translate-x-1 hover:text-[#B88716]">
                        Collections
                    </a>

                    <a href="/gallery" class="text-sm text-[#5F6670] transition hover:translate-x-1 hover:text-[#B88716]">
                        Gallery
                    </a>

                    <a href="/contact" class="text-sm text-[#5F6670] transition hover:translate-x-1 hover:text-[#B88716]">
                        Contact
                    </a>

                </nav>

            </div>


            {{-- Products --}}
            <div class="reveal">

                <h4 class="text-xs font-bold uppercase tracking-[.24em] text-[#5A3C12]">
                    Our Products
                </h4>

                <nav class="mt-6 flex flex-col gap-4">

                    <a href="/catalog" class="text-sm text-[#5F6670] transition hover:translate-x-1 hover:text-[#B88716]">
                        Fabrics
                    </a>

                    <a href="/catalog" class="text-sm text-[#5F6670] transition hover:translate-x-1 hover:text-[#B88716]">
                        Sarees
                    </a>

                    <a href="/catalog" class="text-sm text-[#5F6670] transition hover:translate-x-1 hover:text-[#B88716]">
                        Kurtas
                    </a>

                    <a href="/catalog" class="text-sm text-[#5F6670] transition hover:translate-x-1 hover:text-[#B88716]">
                        Dupattas
                    </a>

                    <a href="/catalog" class="text-sm text-[#5F6670] transition hover:translate-x-1 hover:text-[#B88716]">
                        Creative Director
                    </a>

                </nav>

            </div>


            {{-- Contact --}}
            <div class="reveal">

                <h4 class="text-xs font-bold uppercase tracking-[.24em] text-[#5A3C12]">
                    Get In Touch
                </h4>

                <div class="mt-6 space-y-5">

                    {{-- Address --}}
                    <a
                        href="#"
                        class="group flex items-start gap-4"
                    >
                        <span
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full border border-[#D4A62A]/50 bg-[#FFFDF5] text-[#B88716] transition group-hover:bg-[#D4A62A] group-hover:text-white"
                        >
                            <x-icon name="map-pin" class="h-5 w-5" />
                        </span>

                        <span class="pt-1 text-sm leading-6 text-[#5F6670]">
                            123 Textile Market, Agra,<br>
                            Uttar Pradesh, India
                        </span>
                    </a>


                    {{-- Phone --}}
                    <a
                        href="tel:+917817875621"
                        class="group flex items-center gap-4"
                    >
                        <span
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full border border-[#D4A62A]/50 bg-[#FFFDF5] text-[#B88716] transition group-hover:bg-[#D4A62A] group-hover:text-white"
                        >
                            <x-icon name="phone" class="h-5 w-5" />
                        </span>

                        <span class="text-sm text-[#5F6670] group-hover:text-[#B88716]">
                            +91 7817875621
                        </span>
                    </a>


                    {{-- Email --}}
                    <a
                        href="mailto:info@nivritti.com"
                        class="group flex items-center gap-4"
                    >
                        <span
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full border border-[#D4A62A]/50 bg-[#FFFDF5] text-[#B88716] transition group-hover:bg-[#D4A62A] group-hover:text-white"
                        >
                            <x-icon name="mail" class="h-5 w-5" />
                        </span>

                        <span class="text-sm text-[#5F6670] underline-offset-4 group-hover:text-[#B88716] group-hover:underline">
                            info@nivritti.com
                        </span>
                    </a>

                </div>

            </div>

        </div>


        {{-- Decorative Divider --}}
        <div class="relative my-9 flex items-center justify-center sm:my-10">

            <div class="h-px flex-1 bg-[#D4A62A]/35"></div>

            <div class="mx-5 flex h-12 w-12 shrink-0 items-center justify-center text-[#D4A62A]">
                <svg
                    viewBox="0 0 64 64"
                    class="h-12 w-12"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.4"
                    aria-hidden="true"
                >
                    <path d="M32 58V6" />
                    <path d="M32 22C23 18 18 11 19 5c8 2 13 8 13 17Z" />
                    <path d="M32 22C41 18 46 11 45 5c-8 2-13 8-13 17Z" />
                    <path d="M32 38C22 34 16 27 17 20c9 2 15 8 15 18Z" />
                    <path d="M32 38C42 34 48 27 47 20c-9 2-15 8-15 18Z" />
                    <path d="M32 51C24 48 20 43 21 37c7 2 11 6 11 14Z" />
                    <path d="M32 51C40 48 44 43 43 37c-7 2-11 6-11 14Z" />
                </svg>
            </div>

            <div class="h-px flex-1 bg-[#D4A62A]/35"></div>

        </div>


        {{-- Bottom Bar --}}
        <div class="flex flex-col gap-4 text-xs text-[#5F6670] sm:flex-row sm:items-center sm:justify-between">

            <p>
                © {{ date('Y') }} Nivritti. All rights reserved.
            </p>

            <div class="flex items-center gap-4 sm:gap-6">

                <a
                    href="#"
                    class="transition hover:text-[#B88716]"
                >
                    Privacy Policy
                </a>

                <span class="h-4 w-px bg-[#D4A62A]/40"></span>

                <a
                    href="#"
                    class="transition hover:text-[#B88716]"
                >
                    Terms & Conditions
                </a>

            </div>

        </div>

    </div>

</footer>


@endsection