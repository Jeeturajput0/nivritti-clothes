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

        <div class="mt-5 grid gap-5 sm:grid-cols-2 xl:grid-cols-4 lg:mt-8 lg:gap-6">
            @foreach($services as $service)
            <article data-service-card class="service-card flex h-full flex-col border border-brass/30 bg-[#FFFEF9] p-6 sm:p-7">
                <span class="service-icon flex h-14 w-14 items-center justify-center rounded-full bg-brass text-ink" aria-hidden="true">
                    @switch($service['icon'])
                    @case('layers')
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                        <path d="M12 2 2 7l10 5 10-5-10-5Z" />
                        <path d="m2 12 10 5 10-5" />
                        <path d="m2 17 10 5 10-5" />
                    </svg>
                    @break
                    @case('workflow')
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                        <rect width="8" height="8" x="3" y="3" rx="2" />
                        <path d="M7 11v4a2 2 0 0 0 2 2h4" />
                        <rect width="8" height="8" x="13" y="13" rx="2" />
                    </svg>
                    @break
                    @case('shirt')
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                        <path d="M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z" />
                    </svg>
                    @break
                    @case('leaf')
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                        <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z" />
                        <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12" />
                    </svg>
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
                <a href="/about" class="services-cta inline-flex shrink-0 items-center gap-3 rounded-sm bg-brass px-8 py-4 text-sm font-semibold text-ink">
                    See All Services
                    <span class="services-cta-arrow" aria-hidden="true">→</span>
                </a>
            </div>
        </div>
    </div>
</section>
