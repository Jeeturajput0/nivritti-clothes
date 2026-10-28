@extends('layouts.app')

@section('title', 'Nivritti | Thoughtful textiles for a modern world')

@section('content')
{{-- Hero --}}
<section id="home-hero" class="relative flex min-h-[680px] items-end overflow-hidden bg-stone-900 pt-28 sm:min-h-[680px]" role="region" aria-roledescription="carousel" aria-label="Nivritti textile stories">
    <div class="absolute inset-0">
        <img data-hero-slide src="{{ asset('images/hero/5.jpg') }}" alt="Nivritti garment production floor with rows of sewing stations" class="absolute inset-0 h-full w-full object-cover object-center opacity-100 transition-opacity duration-1000">
        <img data-hero-slide src="{{ asset('images/hero/images (1).jpeg') }}" alt="Two Nivritti workers in orange headscarves at their machines" class="absolute inset-0 h-full w-full object-cover object-center opacity-0 transition-opacity duration-1000" aria-hidden="true">
        <img data-hero-slide src="{{ asset('images/hero/images.jpeg') }}" alt="A long row of sewing stations inside the Nivritti workshop" class="absolute inset-0 h-full w-full object-cover object-center opacity-0 transition-opacity duration-1000" aria-hidden="true">
    </div>
    <div class="pointer-events-none absolute inset-0 bg-gradient-to-r from-black/60 via-black/30 to-black/10"></div>
    <div class="relative mx-auto w-full max-w-7xl px-5 pb-16 pt-16 text-white sm:px-6 lg:px-8 lg:pb-20">
        <p class="reveal mb-6 text-xs uppercase tracking-[.32em] text-white/75">Nivritti · Textiles with intention</p>
        <h1 class="reveal serif max-w-4xl text-5xl font-normal leading-[1.02] tracking-tight sm:text-6xl lg:text-8xl">Made of craft.<br><em class="font-normal">Made for tomorrow.</em></h1>
        <div class="mt-8 flex flex-col gap-7 sm:flex-row sm:items-end sm:justify-between">
            <p class="reveal max-w-lg text-base leading-7 text-white/80">We bring thoughtful design, responsible making and the quiet beauty of textiles together.</p>
            <div class="reveal flex flex-wrap gap-3"><a href="/catalog" class="inline-flex items-center gap-4 bg-[#102840] px-6 py-4 text-sm text-white transition hover:bg-[#0b2136]">Explore the collection <span aria-hidden="true">↗</span></a><a href="/about" class="inline-flex items-center border border-white/50 px-6 py-4 text-sm text-white transition hover:bg-white hover:text-stone-900">Our approach</a></div>
        </div>
        <div class="mt-14 flex items-center justify-between gap-6">
            <div class="flex items-center gap-3 text-[10px] uppercase tracking-[.24em] text-white/70"><span class="h-px w-12 bg-white/60"></span> Scroll to discover</div>
            <div class="flex items-center gap-2" aria-label="Choose hero image">
                <button type="button" data-hero-dot="0" class="h-1 w-8 bg-white transition-all" aria-label="Show slide 1" aria-current="true"></button>
                <button type="button" data-hero-dot="1" class="h-1 w-4 bg-white/45 transition-all" aria-label="Show slide 2" aria-current="false"></button>
                <button type="button" data-hero-dot="2" class="h-1 w-4 bg-white/45 transition-all" aria-label="Show slide 3" aria-current="false"></button>
            </div>
        </div>
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
                dot.classList.toggle('bg-white', active);
                dot.classList.toggle('bg-white/45', !active);
                dot.setAttribute('aria-current', String(active));
            });
        };

        dots.forEach((dot, index) => dot.addEventListener('click', () => showSlide(index)));
        window.setInterval(() => showSlide(currentSlide + 1), 3000);
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
<section id="about-intro" class="scroll-mt-28 overflow-hidden bg-[#F5F7FC] py-8 md:py-10 lg:py-12">
    <div class="mx-auto grid max-w-7xl gap-10 px-5 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-start lg:gap-12 lg:px-8">
        {{-- Editorial copy --}}
        <div class="relative z-10 order-2 max-w-4xl lg:order-1">
            <p data-intro-label class="inline-flex items-center gap-3 rounded-full border border-slate-300 px-4 py-2 text-xs font-semibold uppercase tracking-wide text-[#102840]"><span class="h-2 w-2 bg-[#f5df60]"></span> About us</p>
            <h2 class="intro-heading serif mt-4 max-w-3xl text-4xl text-[#102840] sm:text-2xl" aria-label="Where tradition meets modern Nivritti craftsmanship.">
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
            <p data-intro-description class="mt-5 max-w-3xl text-base leading-8 text-slate-600 lg:text-lg">At Nivritti, traditional textile knowledge meets contemporary design. We work with considered materials and skilled makers to create apparel with thoughtful details, careful quality checks and lasting appeal.</p>

            {{-- Feature checklist --}}
            <div class="mt-6 grid max-w-3xl grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">
                @foreach(['Thoughtful material selection', 'Careful quality inspection', 'Textile development expertise', 'Experienced craft partners'] as $point)
                <p data-intro-point class="flex items-center gap-3 text-sm font-medium text-[#102840] sm:text-base"><span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-[#e8cf43] text-xs font-bold text-[#102840]">✓</span>{{ $point }}</p>
                @endforeach
            </div>

            {{-- Editorial feature blocks --}}
            <div class="mt-8 grid max-w-3xl gap-6 border-t border-slate-300 pt-6 sm:grid-cols-2 sm:gap-5">
                <div data-intro-feature class="flex items-center gap-4"><span class="flex h-16 w-16 shrink-0 items-center justify-center rounded-md bg-[#102840] text-[#f5df60]" aria-hidden="true"><svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                            <path d="m4 7 8-4 8 4-8 4-8-4Z"></path>
                            <path d="m4 12 8 4 8-4M4 17l8 4 8-4"></path>
                        </svg></span><span class="text-base font-medium leading-7 text-[#102840]">Collaborative Design<br>Partnerships</span></div>
                <div data-intro-feature class="flex items-center gap-4"><span class="flex h-16 w-16 shrink-0 items-center justify-center rounded-md bg-[#102840] text-[#f5df60]" aria-hidden="true"><svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                            <path d="M4 4h16v5H4zM7 9v11m10-11v11M4 20h16M9 13h6"></path>
                            <path d="M7 2v2m10-2v2"></path>
                        </svg></span><span class="text-base font-medium leading-7 text-[#102840]">Textile Development<br>&amp; Finishing</span></div>
            </div>

            {{-- CTA and contact --}}
            <div class="mt-7 flex flex-wrap items-center gap-x-7 gap-y-5">
                <a href="/about" data-intro-cta class="group inline-flex items-center gap-4 rounded-full bg-[#f5df60] px-7 py-4 text-sm font-bold uppercase text-[#102840] transition duration-300 ease-out hover:-translate-y-0.5 hover:bg-[#edda4f]">Explore more <span class="inline-block transition-transform duration-300 group-hover:translate-x-1">→</span></a>
                <div data-intro-contact class="flex items-center gap-3 text-[#102840]"><span class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full border border-[#102840]" aria-hidden="true"><svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M6.6 3.5 9 3l2 4.8-2 1.4a15 15 0 0 0 5.8 5.8l1.4-2 4.8 2-.5 2.4a2 2 0 0 1-2 1.6A15.5 15.5 0 0 1 5 5.5a2 2 0 0 1 1.6-2Z"></path>
                        </svg></span><span><span class="block text-sm text-slate-600">For enquiries</span><span class="mt-1 block text-lg font-semibold">+91 XXX XXX XXXX</span></span></div>
            </div>
        </div>

        {{-- Editorial image — right column on desktop --}}
        <div class="order-1 lg:order-2">
            <div data-intro-image class="image-zoom relative h-[560px] overflow-hidden rounded-[28px] bg-slate-200">
                <img src="{{ asset('images/about/about-hero.jpg') }}" alt="Nivritti makers working across rows of sewing machines inside the workshop" class="h-full w-full object-cover" loading="lazy">
                <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-[#102840]/25 via-transparent to-transparent" aria-hidden="true"></div>
            </div>
        </div>

    </div>
</section>

{{-- Highlights --}}
<section class="border-y border-slate-200 py-8 md:py-10">
    <div class="mx-auto grid max-w-7xl grid-cols-2 gap-y-10 px-5 sm:px-6 md:grid-cols-4 lg:px-8">
        @foreach([['25+', 'years of craft'], ['18', 'partner workshops'], ['12', 'markets reached'], ['100%', 'care in every detail']] as $stat)
        <div class="border-slate-300 px-4 first:pl-0 md:border-l md:px-8">
            <p class="serif text-4xl tabular-nums text-[#102840]">{{ $stat[0] }}</p>
            <p class="mt-2 text-xs uppercase tracking-[.16em] text-slate-600">{{ $stat[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Shop by category --}}
<style>
    /* Shop by category — continuous right-to-left marquee */
    @keyframes category-marquee {
        from { transform: translate3d(0, 0, 0); }
        to { transform: translate3d(-50%, 0, 0); }
    }

    .category-track {
        animation: category-marquee 46s linear infinite;
        will-change: transform;
    }

    .category-viewport:hover .category-track,
    .category-viewport:focus-within .category-track {
        animation-play-state: paused;
    }

    @media (prefers-reduced-motion: reduce) {
        .category-track {
            animation: none;
        }

        .category-viewport {
            overflow-x: auto;
        }
    }
</style>
@php
    $categories = [
        ['Three Piece Kurti Dupatta Sets', 'Elegant three-piece kurti dupatta sets designed for comfortable everyday wear and festive occasions.', 'images/categories/three-piece-sets.jpg', 'S · M · L · XL · XXL'],
        ['Frock Kurtis', 'Stylish frock kurtis featuring comfortable fabrics and modern ethnic designs.', 'images/categories/frock-kurtis.jpg', 'S · M · L · XL · XXL'],
        ['Kurtis', 'Beautiful everyday and ethnic kurtis crafted in comfortable fabrics with attractive designs.', 'images/categories/kurtis.jpg', 'S · M · L · XL · XXL'],
        ['Two Piece Co-ord Sets', 'Modern two-piece co-ord sets designed for effortless contemporary ethnic styling.', 'images/categories/co-ord-sets.jpg', 'S · M · L · XL · XXL'],
        ['Quality Fabrics', 'Premium quality fabrics including cotton, muslin, rayon and other comfortable materials.', 'images/categories/cotton-collection.jpg', 'Cotton · Muslin · Rayon'],
    ];
@endphp
<section aria-labelledby="shop-category-title" class="bg-[#F5F7FC] py-8 md:py-10 lg:py-12">
    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
        <div class="reveal mb-8 max-w-2xl lg:mb-9">
            <p class="text-xs uppercase tracking-[.25em] text-[#102840]">Shop by category</p>
            <h2 id="shop-category-title" class="serif mt-4 text-4xl sm:text-2xl">Find your kind of everyday.</h2>
        </div>

        {{-- Slider: auto-scrolls right to left, pauses on hover, hovered card grows --}}
        <div class="category-viewport relative overflow-hidden">
            <div class="category-track flex w-max">
                @for ($pass = 0; $pass < 2; $pass++)
                    @foreach ($categories as $category)
                    <div class="w-[250px] shrink-0 pr-4 sm:w-[290px] lg:w-[300px] lg:pr-5" @if ($pass === 1) aria-hidden="true" @endif>
                        <a href="/catalog" class="group/card relative block origin-center transition-transform duration-500 ease-out hover:z-10 hover:scale-[1.035] focus-visible:z-10 focus-visible:scale-[1.035]" @if ($pass === 1) tabindex="-1" @endif aria-label="Shop {{ $category[0] }}">
                            <div class="relative aspect-[4/5] overflow-hidden rounded-3xl bg-stone-200">
                                <img src="{{ asset($category[2]) }}" alt="{{ $category[0] }}" class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover/card:scale-105" loading="lazy">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/10 to-transparent"></div>
                                <div class="absolute inset-x-0 bottom-0 p-4 text-white transition-transform duration-500 ease-out group-hover/card:-translate-y-0.5 sm:p-5">
                                    <h3 class="text-sm font-semibold leading-snug">{{ $category[0] }}</h3>
                                    <p class="mt-1 text-[10px] tracking-wide text-white/80">{{ $category[3] }}</p>
                                </div>
                            </div>
                            <p class="mt-3 text-xs leading-5 text-slate-600">{{ $category[1] }}</p>
                        </a>
                    </div>
                    @endforeach
                @endfor
            </div>

            <div class="pointer-events-none absolute inset-y-0 left-0 w-10 bg-gradient-to-r from-[#F5F7FC] via-[#F5F7FC]/80 to-transparent sm:w-16" aria-hidden="true"></div>
            <div class="pointer-events-none absolute inset-y-0 right-0 w-10 bg-gradient-to-l from-[#F5F7FC] via-[#F5F7FC]/80 to-transparent sm:w-16" aria-hidden="true"></div>
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
<section id="services" class="services-section relative overflow-hidden bg-[#F5F7FC] py-8 md:py-10 lg:py-12" aria-labelledby="services-title">
    <div class="pointer-events-none absolute -right-32 top-24 h-[420px] w-[420px] rounded-full border border-[#0b2136]/[.055]" aria-hidden="true"></div>
    <div class="pointer-events-none absolute -left-40 bottom-10 h-[380px] w-[380px] rounded-full border border-[#0b2136]/[.04]" aria-hidden="true"></div>

    <div class="relative mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <p data-services-label class="inline-flex items-center gap-3 text-[11px] font-semibold uppercase tracking-[.3em] text-[#a8842c]">
                <span class="h-px w-6 bg-[#dcc76a]" aria-hidden="true"></span>
                What we do
                <span class="h-px w-6 bg-[#dcc76a]" aria-hidden="true"></span>
            </p>
            <h2 id="services-title" data-services-heading class="serif mt-4 text-4xl text-[#0b2136] sm:text-2xl">Complete Nivritti &amp; Garment<br class="hidden sm:block"> Manufacturing Solutions</h2>
        </div>

        <div class="mt-10 grid gap-5 sm:grid-cols-2 xl:grid-cols-4 lg:mt-12 lg:gap-6">
            @foreach($services as $service)
            <article data-service-card class="service-card flex h-full flex-col rounded-3xl border border-[#e6edf7] bg-[#f3f6fc] p-6 sm:p-7">
                <span class="service-icon flex h-14 w-14 items-center justify-center rounded-full bg-[#e8cf43] text-[#0b2136]" aria-hidden="true">
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

                <p class="mt-7 text-[11px] font-semibold tracking-[.16em] text-[#0b2136]/35" aria-hidden="true">{{ $service['number'] }}</p>
                <h3 class="mt-2.5 text-xl font-semibold leading-snug tracking-[-.01em] text-[#0b2136] lg:text-[21px] xl:min-h-[3.5rem]">{{ $service['title'] }}</h3>
                <p class="mt-3 text-sm leading-7 text-slate-500">{{ $service['description'] }}</p>
            </article>
            @endforeach
        </div>

        <div class="mt-10 lg:mt-12">
            <div class="flex flex-col items-center justify-between gap-6 text-center lg:flex-row lg:text-left">
                <p class="max-w-xl text-lg font-medium leading-8 tracking-[-.01em] text-[#0b2136] lg:text-xl">Don't Hesitate, Contact Us For Better Help And Services.</p>
                <a href="/about" class="services-cta inline-flex shrink-0 items-center gap-3 rounded-full bg-[#e8cf43] px-8 py-4 text-sm font-semibold text-[#0b2136]">
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
<section id="collection" data-collection-section class="relative overflow-hidden bg-[#F5F7FC] py-8 md:py-10 lg:py-12" aria-labelledby="collection-title">
    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <p data-collection-label class="inline-flex items-center gap-3 rounded-full border border-slate-300 px-4 py-2 text-xs font-semibold uppercase tracking-wide text-[#102840]"><span class="h-2 w-2 bg-[#f5df60]" aria-hidden="true"></span> Our collection</p>
            <h2 id="collection-title" data-collection-heading class="serif mt-4 text-4xl text-[#102840] sm:text-2xl">Explore Our Premium Collection</h2>
            <p data-collection-text class="mt-5 max-w-2xl text-base leading-8 text-slate-600 lg:text-lg">Discover thoughtfully crafted textiles designed with quality, comfort and modern fashion in mind.</p>
        </div>

        <div data-collection-grid class="mt-10 grid gap-x-4 gap-y-7 sm:grid-cols-2 lg:mt-12 lg:grid-cols-4 lg:gap-x-5 lg:gap-y-8">
            @foreach($products as $index => $product)
            <article data-product-card class="h-full">
                <a href="/catalog" class="product-card group flex h-full flex-col">
                    <div class="product-media relative aspect-[4/5] shrink-0 overflow-hidden rounded-2xl bg-[#e8eef7]">
                        <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="product-img product-img--main absolute inset-0 h-full w-full object-cover" loading="lazy">
                        <img src="{{ asset($product['hover']) }}" alt="" class="product-img product-img--alt absolute inset-0 h-full w-full object-cover" loading="lazy" aria-hidden="true">
                        <span class="product-overlay pointer-events-none absolute inset-0" aria-hidden="true"></span>
                    </div>

                    <div class="mt-3.5 flex flex-1 flex-col">
                        <div class="flex items-center justify-between gap-3">
                            <p class="product-category text-[9px] font-semibold uppercase tracking-[.18em] text-slate-500 opacity-75">{{ $product['category'] }}</p>
                            <span class="text-[9px] font-medium tracking-[.16em] text-slate-400" aria-hidden="true">0{{ $index + 1 }}</span>
                        </div>
                        <h3 class="product-title mt-1.5 text-2xl font-semibold leading-snug tracking-[-.01em] text-[#102840]">{{ $product['name'] }}</h3>
                        <p class="mt-1.5 text-[13px] leading-6 text-slate-600">{{ $product['description'] }}</p>

                        <div class="mt-auto pt-3">
                            <div class="flex items-center justify-between gap-3 border-t border-[#102840]/10 pt-3">
                                <span class="text-[13px] font-semibold text-[#102840]">Order now</span>
                                <span class="product-cta-badge flex h-8 w-8 items-center justify-center rounded-full bg-[#f5df60] text-[#102840]" aria-hidden="true">
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
<section id="reviews" class="relative mx-5 scroll-mt-24 overflow-hidden rounded-[7px] bg-[#0b2136] py-8 text-white md:mx-[120px] md:py-10 lg:py-12" aria-labelledby="reviews-title">
    <div class="pointer-events-none absolute inset-0" aria-hidden="true">
        <div class="absolute inset-0 opacity-[.045]" style="background-image: linear-gradient(to right, #ffffff 1px, transparent 1px), linear-gradient(to bottom, #ffffff 1px, transparent 1px); background-size: 88px 88px;"></div>
        <div class="absolute -right-28 -top-36 h-[560px] w-[560px] rounded-full border border-white/[.07]"></div>
        <div class="absolute -right-10 -top-16 h-[400px] w-[400px] rounded-full border border-white/[.05]"></div>
        <div class="absolute -bottom-40 -left-24 h-[460px] w-[460px] rounded-full border border-white/[.04]"></div>
        <span class="absolute left-3 top-10 h-6 w-6 rounded-full bg-[#c9b64a]/70 sm:left-7"></span>
    </div>

    <div class="relative mx-auto max-w-7xl px-8">
        <div class="grid gap-6 xl:grid-cols-[minmax(0,1fr)_260px_minmax(0,1.42fr)] xl:grid-rows-[auto_auto] xl:items-start xl:gap-x-6 xl:gap-y-6">
            <div class="reveal xl:col-span-2 xl:col-start-1 xl:row-start-1">
                <p class="inline-flex items-center gap-3 rounded-full border border-white/25 px-4 py-2 text-[11px] font-medium uppercase tracking-[.18em] text-white/85"><span class="h-2 w-2 bg-[#f5df60]" aria-hidden="true"></span> Customer testimonials</p>
                <h2 id="reviews-title" class="serif mt-3 text-2xl sm:text-3xl">Comments Regarding The<br class="hidden sm:block"> Nivritti Industry</h2>
            </div>

            <div class="reveal flex flex-col justify-between gap-6 xl:col-start-1 xl:row-start-2 xl:h-[340px]">
                <div>
                    <div class="flex items-center">
                        <img src="{{ asset('images/instagram/instagram-1.jpg') }}" alt="Nivritti customer" class="h-11 w-11 rounded-full border-2 border-[#0b2136] object-cover" loading="lazy">
                        <img src="{{ asset('images/instagram/instagram-4.jpg') }}" alt="" class="h-11 w-11 rounded-full border-2 border-[#0b2136] object-cover -ml-3" loading="lazy" aria-hidden="true">
                        <img src="{{ asset('images/instagram/instagram-3.jpg') }}" alt="" class="h-11 w-11 rounded-full border-2 border-[#0b2136] object-cover -ml-3" loading="lazy" aria-hidden="true">
                        <span class="ml-2 flex h-11 w-11 items-center justify-center rounded-full bg-[#e8cf43] text-[11px] font-semibold text-[#0b2136]" aria-hidden="true">10k</span>
                    </div>
                    <p class="mt-4 text-lg font-medium">More Than 10K+ Customers</p>
                </div>
                <p class="max-w-xs text-sm leading-6 text-white/55">Trusted by over 10,000 satisfied customers, we pride ourselves on delivering exceptional service.</p>
            </div>

            <div class="image-zoom reveal relative h-[280px] overflow-hidden rounded-[28px] bg-white/5 sm:h-[340px] xl:col-start-2 xl:row-start-2 xl:-translate-y-3">
                <img src="{{ asset('images/about/about-1.jpg') }}" alt="A Nivritti maker carefully stitching fabric at her machine" class="h-full w-full object-cover" loading="lazy">
            </div>

            <div class="review-slider xl:col-start-3 xl:row-start-2" data-review-slider>
                <div class="review-stage relative grid min-h-[250px]" aria-live="polite">
                    @foreach($reviews as $index => $review)
                    <div class="review-slide col-start-1 row-start-1 {{ $index === 0 ? 'is-active' : '' }}" data-review-slide>
                        <div class="flex items-start gap-3">
                            <span class="review-quote serif shrink-0 text-5xl leading-[.65] text-[#f5df60]" aria-hidden="true">“</span>
                            <p data-review-text class="review-text min-w-0 flex-1 break-words text-base font-medium leading-[1.5] text-white/95 sm:text-lg">{{ $review['text'] }}</p>
                        </div>
                        <div class="mt-7 flex items-center gap-4 border-t border-white/20 pt-5">
                            <img data-review-avatar src="{{ asset($review['image']) }}" alt="" class="h-12 w-12 shrink-0 rounded-full object-cover" loading="lazy" aria-hidden="true">
                            <div>
                                <p data-review-name class="text-base font-semibold text-white">{{ $review['name'] }}</p>
                                <p data-review-role class="mt-1 text-sm text-white/55">{{ $review['designation'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-6 flex items-center gap-2" role="group" aria-label="Choose a review">
                    @foreach($reviews as $index => $review)
                    <button type="button" class="review-dot {{ $index === 0 ? 'is-active' : '' }}" data-review-dot data-review-index="{{ $index }}" aria-label="View review {{ $index + 1 }}" @if($index === 0) aria-current="true" @endif></button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Final CTA --}}
<section class="py-8 md:py-10 lg:py-12">
    <div class="reveal mx-auto flex max-w-7xl flex-col items-center justify-between gap-8 px-5 text-center sm:px-6 lg:flex-row lg:items-center lg:gap-10 lg:px-8 lg:text-left">
        {{-- Left content --}}
        <div class="max-w-3xl">
            <p class="text-xs uppercase tracking-[.25em] text-black">Let's begin</p>
            <h2 class="serif mt-5 text-4xl leading-tight text-stone-900 sm:text-5xl lg:text-6xl">Let's make something meaningful.</h2>
            <p class="mt-6 max-w-xl text-sm leading-7 text-stone-600 lg:text-base">Have an idea, a question or a project in mind? We would love to hear what you are working on.</p>
        </div>

        {{-- Right buttons --}}
        <div class="flex w-full shrink-0 flex-wrap justify-center gap-3 sm:w-auto lg:justify-end">
            <a href="/contact" class="inline-flex w-full items-center justify-center whitespace-nowrap bg-[#edf05a] px-7 py-4 text-sm text-black transition duration-300 hover:-translate-y-1 hover:bg-[#e6fa64] sm:w-auto">Start a conversation ↗</a>
            <a href="/catalog" class="inline-flex w-full items-center justify-center whitespace-nowrap border border-stone-400 px-7 py-4 text-sm text-stone-900 transition duration-300 hover:-translate-y-1 hover:border-stone-900 sm:w-auto">View collection</a>
        </div>
    </div>
</section>
@endsection
