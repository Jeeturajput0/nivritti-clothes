@extends('layouts.app')

@section('title', 'Nivritti | Thoughtful textiles for a modern world')

@section('content')
{{-- Hero --}}
<section id="home-hero" data-premium-hero class="relative flex min-h-[680px] items-end overflow-hidden bg-ink/25 pt-28 sm:min-h-[680px]" role="region" aria-roledescription="carousel" aria-label="Nivritti textile stories">
    <div data-hero-media class="absolute inset-0">
        <img data-hero-slide src="{{ asset('images/hero/images (1).jpeg') }}" alt="Two Nivritti workers in orange headscarves at their machines" class="absolute inset-0 h-full w-full object-cover object-center opacity-0 transition-opacity duration-1000" aria-hidden="true">
        <img data-hero-slide src="{{ asset('images/hero/images.jpeg') }}" alt="A long row of sewing stations inside the Nivritti workshop" class="absolute inset-0 h-full w-full object-cover object-center opacity-0 transition-opacity duration-1000" aria-hidden="true">
        <img data-hero-slide src="{{ asset('images/hero/5.jpg') }}" alt="Nivritti garment production floor with rows of sewing stations" class="absolute inset-0 h-full w-full object-cover object-center opacity-100 transition-opacity duration-1000">
    </div>
    <div class="pointer-events-none absolute inset-0 bg-gradient-to-r from-ink/95 via-ink/80 to-ink/40"></div>
    <svg class="needle-thread absolute right-0 top-0 z-[1] hidden h-full w-[68%] text-brass/80 sm:block" viewBox="0 0 1000 680" preserveAspectRatio="none" aria-hidden="true">
        <path data-thread-path d="M650 20C850 70 920 145 850 245S680 375 790 465s150 125 70 195" fill="none" stroke="currentColor" stroke-width="1.1" stroke-dasharray="3 9" stroke-linecap="round" />
        <g data-thread-needle visibility="hidden">
            <path d="M-17 0 11 0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            <path d="m11 0 7 0-5 3" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" />
            <circle cx="-11" cy="0" r="1.4" fill="none" stroke="currentColor" stroke-width="1" />
        </g>
    </svg>
    <div class="relative mx-auto w-full max-w-7xl px-5 pb-16 pt-16 text-ivory sm:px-6 lg:px-8 lg:pb-20">
        <p class="reveal mb-6 text-xs uppercase tracking-[.32em] text-ivory/75">Nivritti · Textiles with intention</p>
        <h1 class="reveal serif max-w-4xl text-2xl font-normal leading-[1.02] tracking-tight">Made of craft.<br><em class="font-normal">Made for tomorrow.</em></h1>
        <div class="mt-8 flex flex-col gap-7 sm:flex-row sm:items-end sm:justify-between">
            <p class="reveal max-w-lg text-base leading-7 text-ivory/80">We bring thoughtful design, responsible making and the quiet beauty of textiles together.</p>
            <div class="reveal flex flex-wrap gap-3"><a href="/catalog" class="inline-flex items-center gap-4 rounded-full bg-brass px-6 py-4 text-sm font-semibold text-white transition hover:bg-brass-soft">Explore the collection <x-icon name="arrow-up-right" class="anim-cta-arrow h-4 w-4" /></a><a href="/about" class="inline-flex items-center rounded-full border border-ivory/50 px-6 py-4 text-sm text-ivory transition hover:border-brass hover:bg-ivory/10">Our approach</a></div>
        </div>
        <div class="mt-14 flex items-center justify-between gap-6">
            <div data-hero-scroll class="flex items-center gap-3 text-[10px] uppercase tracking-[.24em] text-ivory/70"><span class="h-px w-12 bg-ivory/60"></span> Scroll to discover</div>
            <div class="flex items-center gap-2" aria-label="Choose hero image">
                <button type="button" data-hero-dot="0" class="h-1 w-8 bg-ivory transition-all" aria-label="Show slide 1" aria-current="true"></button>
                <button type="button" data-hero-dot="1" class="h-1 w-4 bg-ivory/25 transition-all" aria-label="Show slide 2" aria-current="false"></button>
                <button type="button" data-hero-dot="2" class="h-1 w-4 bg-ivory/25 transition-all" aria-label="Show slide 3" aria-current="false"></button>
            </div>
        </div>
    </div>
</section>


{{-- Highlights --}}
<section class="relative border-t border-b border-ink/10 rounded-t-2xl bg-sand py-6 md:py-8 pb-4">
    <span data-stitch-divider class="stitch-divider" aria-hidden="true"></span>
    <div class="mx-auto grid max-w-7xl grid-cols-2 gap-y-10 px-5 sm:px-6 md:grid-cols-4 lg:px-8">
        @foreach([['25+', 'years of craft'], ['18', 'partner workshops'], ['12', 'markets reached'], ['100%', 'care in every detail']] as $stat)
        <div class="border-ink/15 px-4 first:pl-0 md:border-l md:px-8">
            <p class="serif text-4xl tabular-nums text-ink">{{ $stat[0] }}</p>
            <p class="mt-2 text-xs uppercase tracking-[.16em] text-muted">{{ $stat[1] }}</p>
        </div>
        @endforeach
    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const hero = document.getElementById('home-hero');
        if (!hero) return;

        const slides = [...hero.querySelectorAll('[data-hero-slide]')];
        const dots = [...hero.querySelectorAll('[data-hero-dot]')];
        let currentSlide = 0;

        const showSlide = (index) => {
            currentSlide = (index + slides.length) % slides.length;
            slides.forEach((slide, position) => {
                const active = position === currentSlide;
                slide.classList.toggle('opacity-100', active);
                slide.classList.toggle('opacity-0', !active);
                slide.setAttribute('aria-hidden', String(!active));
            });
            dots.forEach((dot, position) => {
                const active = position === currentSlide;
                dot.classList.toggle('w-8', active);
                dot.classList.toggle('w-4', !active);
                dot.classList.toggle('bg-ivory', active);
                dot.classList.toggle('bg-ivory/45', !active);
                dot.setAttribute('aria-current', String(active));
            });
        };

        dots.forEach((dot, index) => dot.addEventListener('click', () => showSlide(index)));

        const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
        let timer = null;
        const stopAutoPlay = () => {
            if (timer !== null) {
                window.clearInterval(timer);
                timer = null;
            }
        };
        const startAutoPlay = () => {
            stopAutoPlay();
            if (reducedMotion.matches || document.hidden) return;
            timer = window.setInterval(() => showSlide(currentSlide + 1), 7000);
        };

        hero.addEventListener('mouseenter', stopAutoPlay);
        hero.addEventListener('mouseleave', startAutoPlay);
        hero.addEventListener('focusin', stopAutoPlay);
        hero.addEventListener('focusout', (event) => {
            if (!hero.contains(event.relatedTarget)) startAutoPlay();
        });
        document.addEventListener('visibilitychange', startAutoPlay);
        reducedMotion.addEventListener('change', startAutoPlay);
        startAutoPlay();
    });
</script>

{{-- Introduction --}}
<style>
    /* Introduction — editorial masked reveal */
    #about-intro .intro-heading {
        opacity: 1;
        transform: none;
        transition: none;
    }

    #about-intro .heading-line {
        display: block;
    }

    #about-intro .word-mask {
        display: inline-block;
        overflow: hidden;
        vertical-align: bottom;
        margin-right: 0.24em;
        margin-bottom: -0.16em;
        padding-bottom: 0.16em;
    }

    #about-intro .heading-line .word-mask:last-child {
        margin-right: 0;
    }

    #about-intro .heading-word {
        display: inline-block;
        will-change: transform, opacity, filter;
    }

    .js #about-intro .heading-word {
        opacity: 0;
        filter: blur(8px);
    }

    .js #about-intro .intro-heading.is-revealed .heading-word {
        opacity: 1;
        transform: translateY(0);
        filter: blur(0);
    }

    .js #about-intro [data-intro-label],
    .js #about-intro [data-intro-description],
    .js #about-intro [data-intro-point],
    .js #about-intro [data-intro-feature],
    .js #about-intro [data-intro-cta],
    .js #about-intro [data-intro-contact] {
        opacity: 0;
    }

    @media (prefers-reduced-motion: reduce) {

        #about-intro .intro-heading,
        #about-intro .intro-heading .heading-word,
        #about-intro [data-intro-label],
        #about-intro [data-intro-description],
        #about-intro [data-intro-point],
        #about-intro [data-intro-feature],
        #about-intro [data-intro-cta],
        #about-intro [data-intro-contact] {
            opacity: 1 !important;
            transform: none !important;
            filter: none !important;
            transition: none !important;
        }
    }
</style>
<section id="about-intro" class="relative overflow-hidden bg-[radial-gradient(circle_at_top,_rgba(200,155,60,0.12),_transparent_33%),_#f8f5ef] pt-2 md:pt-4 lg:py-10">
    <span data-stitch-divider class="stitch-divider" aria-hidden="true"></span>
    <div class="mx-auto max-w-7xl rounded-b-[30px] border border-ink/10 bg-sand px-4 py-5 shadow-[0_18px_45px_-30px_rgba(27,25,21,0.28)] sm:px-6 sm:py-6 lg:px-8 lg:py-8">
        <div class="grid gap-8 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:gap-12">
            {{-- Editorial copy --}}
            <div class="relative z-10 order-2 max-w-4xl lg:order-1">
                <x-section-label label="About us" data-intro-label />
                <h2 class="intro-heading serif mt-4 max-w-3xl text-2xl text-ink" aria-label="Where tradition meets modern Nivritti craftsmanship.">
                    <span class="heading-line sm:whitespace-nowrap" aria-hidden="true">
                        <span class="word-mask"><span class="heading-word">Where</span></span><span class="word-mask"><span class="heading-word">tradition</span></span>
                    </span>
                    <span class="heading-line sm:whitespace-nowrap" aria-hidden="true">
                        <span class="word-mask"><span class="heading-word">meets</span></span><span class="word-mask"><span class="heading-word">modern</span></span>
                    </span>
                    <span class="heading-line sm:whitespace-nowrap" aria-hidden="true">
                        <span class="word-mask"><span class="heading-word">Nivritti</span></span><span class="word-mask"><span class="heading-word">craftsmanship.</span></span>
                    </span>
                </h2>
                <p data-intro-description class="mt-5 max-w-3xl text-base leading-8 text-muted lg:text-lg">At Nivritti, traditional textile knowledge meets contemporary design. We work with considered materials and skilled makers to create apparel with thoughtful details, careful quality checks and lasting appeal.</p>

                {{-- Feature checklist --}}
                <div class="mt-6 grid max-w-3xl grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">
                    @foreach(['Thoughtful material selection', 'Careful quality inspection', 'Textile development expertise', 'Experienced craft partners'] as $point)
                    <p data-intro-point class="flex items-center gap-3 rounded-full border border-ink/10 bg-ivory/80 px-4 py-2.5 text-sm font-medium text-ink sm:text-base"><span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-white text-xs font-bold text-ink">✓</span>{{ $point }}</p>
                    @endforeach
                </div>

                {{-- Editorial feature blocks --}}
                <div class="mt-8 grid max-w-3xl gap-6 border-t border-ink/15 pt-6 sm:grid-cols-2 sm:gap-5">
                    <div data-intro-feature class="flex items-center gap-4 rounded-2xl border border-ink/10 bg-ivory/80 p-4"><span class="flex h-16 w-16 shrink-0 items-center justify-center rounded-md bg-ink text-white" aria-hidden="true"><svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                                <path d="m4 7 8-4 8 4-8 4-8-4Z"></path>
                                <path d="m4 12 8 4 8-4M4 17l8 4 8-4"></path>
                            </svg></span><span class="text-base font-medium leading-7 text-ink">Collaborative Design<br>Partnerships</span></div>
                    <div data-intro-feature class="flex items-center gap-4 rounded-2xl border border-ink/10 bg-ivory/80 p-4"><span class="flex h-16 w-16 shrink-0 items-center justify-center rounded-md bg-ink text-white" aria-hidden="true"><svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                                <path d="M4 4h16v5H4zM7 9v11m10-11v11M4 20h16M9 13h6"></path>
                                <path d="M7 2v2m10-2v2"></path>
                            </svg></span><span class="text-base font-medium leading-7 text-ink">Textile Development<br>&amp; Finishing</span></div>
                </div>

                {{-- CTA and contact --}}
                <div class="mt-7 flex flex-wrap items-center gap-x-7 gap-y-5">
                    <a href="/about" data-intro-cta class="group inline-flex items-center gap-4 rounded-full bg-brass px-7 py-4 text-sm font-bold uppercase text-white transition duration-300 ease-out hover:-translate-y-0.5 hover:bg-brass-soft">Explore more <span class="inline-block transition-transform duration-300 group-hover:translate-x-1">→</span></a>
                    <div data-intro-contact class="flex items-center gap-3 rounded-full border border-ink/10 bg-ivory/80 px-4 py-2.5 text-ink"><span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full border border-ink/30" aria-hidden="true"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                <path d="M6.6 3.5 9 3l2 4.8-2 1.4a15 15 0 0 0 5.8 5.8l1.4-2 4.8 2-.5 2.4a2 2 0 0 1-2 1.6A15.5 15.5 0 0 1 5 5.5a2 2 0 0 1 1.6-2Z"></path>
                            </svg></span><span><span class="block text-sm text-muted">For enquiries</span><span class="mt-1 block text-lg font-semibold">+91 XXX XXX XXXX</span></span></div>
                </div>
            </div>

            {{-- Editorial image — right column on desktop --}}
            <div class="order-1 lg:order-2">
                <div data-intro-image class="image-zoom relative h-[560px] overflow-hidden rounded-[28px] border border-ink/10 bg-sand shadow-[0_30px_60px_-32px_rgba(27,25,21,0.35)]">
                    <img src="{{ asset('images/about/about-hero.jpg') }}" alt="Nivritti makers working across rows of sewing machines inside the workshop" class="h-full w-full object-cover" loading="lazy">
                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-ink/25 via-transparent to-transparent" aria-hidden="true"></div>
                    <div class="absolute left-5 top-5 rounded-full border border-ivory/60 bg-ink/35 px-3 py-1.5 text-[10px] font-semibold uppercase tracking-[.18em] text-ivory backdrop-blur-sm sm:left-6 sm:top-6">Crafted with care</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Shop by category --}}
<style>
    .category-track {
        transition: transform .65s cubic-bezier(.2,.7,.2,1);
        will-change: transform;
    }

    .category-arrow {
        transition: color .25s ease, background-color .25s ease, border-color .25s ease, transform .25s ease;
    }

    .category-arrow:hover {
        transform: translateY(-2px);
    }

    .category-arrow:disabled {
        cursor: not-allowed;
        opacity: .42;
    }

    .category-arrow:disabled:hover {
        transform: none;
    }

    @media (prefers-reduced-motion: reduce) {
        .category-track,
        .category-arrow {
            transition-duration: .01ms;
        }
    }
</style>
@php
    $categories = [
        ['Three Piece Kurti Dupatta Sets', 'images/categories/three-piece-sets.jpg', 'S · M · L · XL · XXL'],
        ['Frock Kurtis', 'images/categories/frock-kurtis.jpg', 'S · M · L · XL · XXL'],
        ['Kurtis', 'images/categories/kurtis.jpg', 'S · M · L · XL · XXL'],
        ['Two Piece Co-ord Sets', 'images/categories/co-ord-sets.jpg', 'S · M · L · XL · XXL'],
        ['Quality Fabrics', 'images/categories/cotton-collection.jpg', 'Cotton · Muslin · Rayon'],
    ];
@endphp
<section aria-labelledby="shop-category-title" class="relative bg-ivory py-8 md:py-10 lg:py-12">
    <span data-stitch-divider class="stitch-divider" aria-hidden="true"></span>
    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
        <div class="reveal mb-8 flex w-full items-end justify-between gap-5 lg:mb-10">
            <div>
                <x-section-label label="Shop by category" />
                <h2 id="shop-category-title" class="serif mt-4 text-2xl">Find your kind of everyday.</h2>
            </div>
            <div class="flex shrink-0 items-center gap-2" role="group" aria-label="Category slider controls">
                <button type="button" class="category-arrow flex h-11 w-11 items-center justify-center rounded-full border border-ink/20 text-ink hover:border-brass hover:bg-brass" data-category-prev aria-label="Previous categories">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
                </button>
                <button type="button" class="category-arrow flex h-11 w-11 items-center justify-center rounded-full border border-ink/20 text-ink hover:border-brass hover:bg-brass" data-category-next aria-label="Next categories">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </button>
            </div>
        </div>

        <div class="category-viewport relative overflow-hidden" data-category-slider>
            <div class="category-track flex w-max" data-category-track>
                @foreach ($categories as $category)
                    <div class="w-[250px] shrink-0 pr-4 sm:w-[290px] lg:w-[300px] lg:pr-5" data-category-slide>
                        <a href="/catalog" class="group/card relative block origin-center transition-transform duration-500 ease-out hover:z-10 hover:scale-[1.035] focus-visible:z-10 focus-visible:scale-[1.035]" aria-label="Shop {{ $category[0] }}">
                            <div class="relative aspect-[4/5] overflow-hidden rounded-3xl">
                                <img src="{{ asset($category[1]) }}" alt="{{ $category[0] }}" class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover/card:scale-105" loading="lazy">
                                <div class="absolute inset-0 bg-gradient-to-t from-ink/75 via-ink/10 to-transparent"></div>
                                <div class="absolute inset-x-0 bottom-0 z-10 p-4 text-ivory sm:p-5">
                                    <h3 class="text-2xl font-semibold leading-snug">{{ $category[0] }}</h3>
                                    <p class="mt-1 text-[10px] tracking-wide text-ivory/80">{{ $category[2] }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="pointer-events-none absolute inset-y-0 left-0 w-10 bg-gradient-to-r from-ivory via-ivory/40 to-transparent sm:w-16" aria-hidden="true"></div>
            <div class="pointer-events-none absolute inset-y-0 right-0 w-10 bg-gradient-to-l from-ivory via-ivory/40 to-transparent sm:w-16" aria-hidden="true"></div>
        </div>

       
    </div>
</section>

{{-- What we do / services --}}
@php
    $services = [
        [
            'number' => '01',
            'title' => 'Woven Textiles',
            'icon' => 'layers',
            'description' => 'Premium woven textiles manufactured with precision, quality materials, and consistent finishing for modern fashion and garment requirements.',
        ],
        [
            'number' => '02',
            'title' => 'Knit Warp & Circular',
            'icon' => 'workflow',
            'description' => 'High-quality knitted fabrics designed for comfort, durability, flexibility, and modern apparel production.',
        ],
        [
            'number' => '03',
            'title' => 'Garment Manufacturing',
            'icon' => 'shirt',
            'description' => 'Complete garment manufacturing solutions combining skilled craftsmanship, modern production techniques, and strict quality control.',
        ],
        [
            'number' => '04',
            'title' => 'Natural Fiber Textiles',
            'icon' => 'leaf',
            'description' => 'Comfortable and sustainable natural fiber textiles crafted from quality materials for everyday and premium fashion applications.',
        ],
    ];
@endphp
<section id="services" class="services-section relative overflow-hidden bg-sand py-8 md:py-10 lg:py-12" aria-labelledby="services-title">
    <span data-stitch-divider class="stitch-divider" aria-hidden="true"></span>
    <div class="pointer-events-none absolute -right-32 top-24 h-[420px] w-[420px] rounded-full border border-brass/25" aria-hidden="true"></div>
    <div class="pointer-events-none absolute -left-40 bottom-10 h-[380px] w-[380px] rounded-full border border-ink/15" aria-hidden="true"></div>

    <div class="relative mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <x-section-label label="What we do" data-services-label />
            <h2 id="services-title" data-services-heading class="serif mt-4 text-2xl text-ink">Complete Nivritti &amp; Garment Manufacturing Solutions</h2>
        </div>

        <div class="mt-5 grid gap-5 sm:grid-cols-2 xl:grid-cols-4 lg:mt-12 lg:gap-6">
            @foreach($services as $service)
            <article data-service-card class="service-card flex h-full flex-col rounded-3xl border border-ink/10 bg-ivory p-6 sm:p-7">
                <span class="service-icon flex h-14 w-14 items-center justify-center rounded-full bg-brass text-white" aria-hidden="true">
                    @switch($service['icon'])
                        @case('layers')
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6"><path d="M12 2 2 7l10 5 10-5-10-5Z"/><path d="m2 12 10 5 10-5"/><path d="m2 17 10 5 10-5"/></svg>
                            @break
                        @case('workflow')
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6"><rect width="8" height="8" x="3" y="3" rx="2"/><path d="M7 11v4a2 2 0 0 0 2 2h4"/><rect width="8" height="8" x="13" y="13" rx="2"/></svg>
                            @break
                        @case('shirt')
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6"><path d="M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"/></svg>
                            @break
                        @case('leaf')
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>
                            @break
                    @endswitch
                </span>

                <p class="mt-7 text-[11px] font-semibold tracking-[.16em] text-muted" aria-hidden="true">{{ $service['number'] }}</p>
                <h3 class="mt-2.5 text-2xl font-semibold leading-snug tracking-[-.01em] text-ink xl:min-h-[3.5rem]">{{ $service['title'] }}</h3>
                <p class="mt-3 text-sm leading-7 text-muted">{{ $service['description'] }}</p>
            </article>
            @endforeach
        </div>

        <div class="mt-6 md:mt-8">
            <div class="flex flex-col items-center justify-between gap-6 text-center lg:flex-row lg:text-left">
                <p class="max-w-xl text-lg font-medium leading-8 tracking-[-.01em] text-ink lg:text-xl">Don't Hesitate, Contact Us For Better Help And Services.</p>
                <a href="/about" class="services-cta inline-flex shrink-0 items-center gap-3 rounded-full bg-brass px-8 py-4 text-sm font-semibold text-white">
                    See All Services
                    <span class="services-cta-arrow" aria-hidden="true">→</span>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Collection --}}
@php
    $products = [
        [
            'category' => 'Clothing',
            'name' => 'The Everyday Tunic',
            'description' => 'A relaxed silhouette in breathable cotton.',
            'image' => 'images/products/product-01-a.jpg',
            'hover' => 'images/products/product-01-b.jpg',
        ],
        [
            'category' => 'Textiles',
            'name' => 'Handwoven Stripe',
            'description' => 'A tactile weave with a quiet, natural palette.',
            'image' => 'images/products/product-02-a.jpg',
            'hover' => 'images/products/product-02-b.jpg',
        ],
        [
            'category' => 'Clothing',
            'name' => 'Indigo Field Shirt',
            'description' => 'Easy layering, finished with considered details.',
            'image' => 'images/products/product-03-a.jpg',
            'hover' => 'images/products/product-03-b.jpg',
        ],
        [
            'category' => 'Accessories',
            'name' => 'Soft Form Scarf',
            'description' => 'Lightweight texture for all-season layering.',
            'image' => 'images/products/product-04-a.jpg',
            'hover' => 'images/products/product-04-b.jpg',
        ],
        [
            'category' => 'Textiles',
            'name' => 'Earth Tone Check',
            'description' => 'A versatile pattern developed in earthy colour.',
            'image' => 'images/products/product-05-a.jpg',
            'hover' => 'images/products/product-05-b.jpg',
        ],
        [
            'category' => 'Clothing',
            'name' => 'The Studio Set',
            'description' => 'An effortless pairing designed for movement.',
            'image' => 'images/products/product-06-a.jpg',
            'hover' => 'images/products/product-06-b.jpg',
        ],
        [
            'category' => 'Textiles',
            'name' => 'Sunset Weave',
            'description' => 'A warm-toned weave with a soft, breathable hand.',
            'image' => 'images/products/product-07-a.jpg',
            'hover' => 'images/products/product-07-b.jpg',
        ],
        [
            'category' => 'Clothing',
            'name' => 'The Wrap Dress',
            'description' => 'Fluid drape with a quietly structured waist.',
            'image' => 'images/products/product-08-a.jpg',
            'hover' => 'images/products/product-08-b.jpg',
        ],
    ];
@endphp
<section id="collection" data-collection-section class="relative overflow-hidden bg-ivory py-8 md:py-10 lg:py-12" aria-labelledby="collection-title">
    <span data-stitch-divider class="stitch-divider" aria-hidden="true"></span>
    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <x-section-label label="Our collection" data-collection-label />
            <h2 id="collection-title" data-collection-heading class="serif mt-4 text-2xl text-ink">Explore Our Premium Collection</h2>
            <p data-collection-text class="mt-5 max-w-2xl text-base leading-8 text-muted lg:text-lg">Discover thoughtfully crafted textiles designed with quality, comfort and modern fashion in mind.</p>
        </div>

        <div data-collection-grid class="mt-10 grid gap-x-4 gap-y-7 sm:grid-cols-2 lg:mt-12 lg:grid-cols-4 lg:gap-x-5 lg:gap-y-8">
            @foreach($products as $index => $product)
            <article data-product-card class="h-full">
                <a href="/catalog" class="product-card group flex h-full flex-col">
                    <div class="product-media relative aspect-[4/5] shrink-0 overflow-hidden rounded-2xl bg-sand">
                        <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="product-img product-img--main absolute inset-0 h-full w-full object-cover" loading="lazy">
                        <img src="{{ asset($product['hover']) }}" alt="" class="product-img product-img--alt absolute inset-0 h-full w-full object-cover" loading="lazy" aria-hidden="true">
                        <span class="product-overlay pointer-events-none absolute inset-0" aria-hidden="true"></span>
                    </div>

                    <div class="mt-3.5 flex flex-1 flex-col">
                        <div class="flex items-center justify-between gap-3">
                            <p class="product-category text-[9px] font-semibold uppercase tracking-[.18em] text-muted opacity-75">{{ $product['category'] }}</p>
                            <span class="text-[9px] font-medium tracking-[.16em] text-muted" aria-hidden="true">0{{ $index + 1 }}</span>
                        </div>
                        <h3 class="product-title mt-1.5 text-2xl font-semibold leading-snug tracking-[-.01em] text-ink">{{ $product['name'] }}</h3>
                        <p class="mt-1.5 text-[13px] leading-6 text-muted">{{ $product['description'] }}</p>

                        <div class="mt-auto pt-3">
                            <div class="flex items-center justify-between gap-3 border-t border-ink/10 pt-3">
                                <span class="text-[13px] font-semibold text-ink">Order now</span>
                                <span class="product-cta-badge flex h-8 w-8 items-center justify-center rounded-full bg-brass text-white" aria-hidden="true">
                                    <svg class="product-cta-arrow h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
            @endforeach
        </div>
    </div>
</section>

{{-- Customer testimonials --}}
@php
$reviews = [
    [
        'text' => 'Nivritti has consistently delivered excellent textile quality and professional service. Their attention to detail and craftsmanship has made them a trusted manufacturing partner for our business.',
        'name' => 'Savannah Nguyen',
        'designation' => 'CEO, AB Tech',
        'image' => 'images/instagram/instagram-3.jpg',
    ],
    [
        'text' => 'We were impressed by the quality, consistency, and timely delivery from the Nivritti team. Their manufacturing expertise and commitment to quality truly stand out.',
        'name' => 'Michael Anderson',
        'designation' => 'Founder, Urban Threads',
        'image' => 'images/instagram/instagram-1.jpg',
    ],
    [
        'text' => 'Working with Nivritti has been a great experience. From product development to final production, their team maintains excellent standards and understands modern textile requirements.',
        'name' => 'Emily Carter',
        'designation' => 'Creative Director, Moda House',
        'image' => 'images/instagram/instagram-6.jpg',
    ],
];
@endphp
@include('trust')
<section id="reviews" class="relative scroll-mt-24 bg-sand px-5 py-8 sm:px-6 sm:py-10 lg:px-8 lg:py-12" aria-labelledby="reviews-title">
    <span data-stitch-divider class="stitch-divider" aria-hidden="true"></span>
    <div class="mx-auto max-w-7xl">
        <div class="reveal mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between lg:mb-10">
            <div>
                <x-section-label label="Customer testimonials" />
                <h2 id="reviews-title" class="serif mt-4 max-w-2xl text-2xl leading-tight text-ink">Good work is remembered.</h2>
            </div>
        </div>

        <div class="grid gap-4 lg:grid-cols-[.9fr_1.1fr] lg:gap-6">
            <div class="image-zoom reveal group relative min-h-[300px] overflow-hidden rounded-[1.75rem] bg-sand sm:min-h-[380px] lg:min-h-[440px]">
                <img src="{{ asset('images/testenomeals.jpeg') }}" alt="A Nivritti maker carefully stitching fabric at her machine" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-t from-ink/75 via-ink/5 to-transparent"></div>
                <div class="absolute bottom-6 left-6 right-24 sm:bottom-8 sm:left-8 sm:right-32">
                    <p class="text-[9px] font-semibold uppercase tracking-[.22em] text-brass-light">Thoughtful textiles</p>
                    <p class="serif mt-2 max-w-sm text-2xl leading-snug text-ivory sm:text-3xl">Made with care, built on trust.</p>
                </div>
                <div class="absolute bottom-5 right-5 h-24 w-20 overflow-hidden rounded-xl border-2 border-ivory bg-sand shadow-[0_12px_30px_-12px_rgba(27,25,21,.55)] sm:bottom-7 sm:right-7 sm:h-36 sm:w-28" aria-hidden="true">
                    <img src="{{ asset('images/process/choose-2.jpg') }}" alt="" class="h-full w-full object-cover" loading="lazy">
                    <span class="absolute inset-x-0 bottom-0 bg-ink/65 px-1.5 py-1 text-center text-[7px] font-medium uppercase tracking-[.12em] text-ivory sm:text-[8px]">In the making</span>
                </div>
            </div>

            <div class="review-slider relative flex min-h-[360px] flex-col justify-between overflow-hidden rounded-[1.75rem] border border-ink/10 bg-sand p-6 sm:min-h-[380px] sm:p-9 lg:min-h-[440px] lg:p-12" data-review-slider>
                <div class="pointer-events-none absolute -bottom-20 -right-16 h-56 w-56 rounded-full border border-brass/20" aria-hidden="true"></div>
                <div class="pointer-events-none absolute -bottom-10 -right-6 h-36 w-36 rounded-full border border-brass/20" aria-hidden="true"></div>
                <div class="relative">
                    <p class="text-[9px] font-semibold uppercase tracking-[.2em] text-brass-deep">A note from our partners</p>
                    <div class="review-stage relative mt-7 grid min-h-[210px] sm:mt-10 sm:min-h-[220px]" aria-live="polite">
                        @foreach($reviews as $index => $review)
                        <div class="review-slide col-start-1 row-start-1 {{ $index === 0 ? 'is-active' : '' }}" data-review-slide>
                            <span class="review-quote serif block h-10 text-6xl leading-none text-brass" aria-hidden="true">“</span>
                            <p data-review-text class="review-text mt-3 max-w-2xl break-words text-lg font-medium leading-[1.55] text-ink sm:text-xl lg:text-2xl">{{ $review['text'] }}</p>
                            <div class="mt-6 flex items-center gap-3 border-t border-ink/10 pt-5">
                                <img data-review-avatar src="{{ asset($review['image']) }}" alt="" class="h-12 w-12 shrink-0 rounded-full border-2 border-ivory object-cover shadow-sm" loading="lazy" aria-hidden="true">
                                <div>
                                    <p data-review-name class="text-sm font-semibold text-ink">{{ $review['name'] }}</p>
                                    <p data-review-role class="mt-1 text-xs text-muted">{{ $review['designation'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="relative mt-5 flex items-center justify-between border-t border-ink/10 pt-5">
                    <p class="text-[9px] font-medium uppercase tracking-[.18em] text-muted">Partnership, in their words</p>
                    <div class="flex items-center gap-3" role="group" aria-label="Choose a review">
                        @foreach($reviews as $index => $review)
                        <button type="button" class="review-dot {{ $index === 0 ? 'is-active' : '' }}" data-review-dot data-review-index="{{ $index }}" aria-label="View review {{ $index + 1 }}" @if($index === 0) aria-current="true" @endif></button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Final CTA --}}
<section class="bg-sand py-8 md:py-10 lg:py-12">
    <div class="reveal mx-auto flex max-w-7xl flex-col items-center justify-between gap-8 px-5 text-center sm:px-6 lg:flex-row lg:items-center lg:gap-10 lg:px-8 lg:text-left">
        {{-- Left content --}}
        <div class="max-w-3xl">
            <x-section-label label="Let's begin" />
            <h2 class="serif mt-5 text-2xl leading-tight text-ink">Let's make something meaningful.</h2>
            <p class="mt-6 max-w-xl text-sm leading-7 text-muted lg:text-base">Have an idea, a question or a project in mind? We would love to hear what you are working on.</p>
        </div>

        {{-- Right buttons --}}
        <div class="flex w-full shrink-0 flex-wrap justify-center gap-3 sm:w-auto lg:justify-end">
            <a href="/contact" class="inline-flex w-full items-center justify-center gap-2 whitespace-nowrap rounded-full bg-brass px-7 py-4 text-sm font-semibold text-white transition duration-300 hover:-translate-y-1 hover:bg-brass-soft sm:w-auto">Start a conversation <x-icon name="arrow-up-right" class="anim-cta-arrow h-4 w-4" /></a>
            <a href="/catalog" class="inline-flex w-full items-center justify-center whitespace-nowrap rounded-full border border-ink/25 px-7 py-4 text-sm text-brass transition duration-300 hover:-translate-y-1 hover:border-brass sm:w-auto">View collection</a>
        </div>
    </div>
</section>
@endsection
