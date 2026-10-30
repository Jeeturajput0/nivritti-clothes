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
                <a href="/catalog" class="inline-flex items-center gap-3 rounded-full bg-ink px-7 py-4 text-sm font-semibold text-ivory transition hover:bg-brass-deep">Explore the collection <x-icon name="arrow-up-right" class="anim-cta-arrow h-4 w-4" /></a>
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
            <article class="reveal rounded-3xl border border-ink/10 bg-ivory p-6 sm:p-7">
                <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-brass text-xs font-semibold tracking-[.16em] text-white">{{ $principle[0] }}</span>
                <h3 class="serif mt-7 text-2xl text-ink">{{ $principle[1] }}</h3>
                <p class="mt-3 text-sm leading-6 text-muted">{{ $principle[2] }}</p>
            </article>
            @endforeach
        </div>
    </div>
</section>
<section class="bg-sand px-5 py-8 text-ink sm:px-6 lg:px-8 lg:py-12">
    <div class="mx-auto grid max-w-7xl gap-8 md:grid-cols-2 lg:px-4">
        <div class="reveal">
            <x-section-label label="Our mission" variant="inverse" />
            <h2 class="serif mt-4 text-4xl">Make with intention.</h2>
            <p class="mt-5 max-w-lg text-base leading-8 text-ink/75">We make textiles that respect their material, serve their purpose and honour the knowledge of the people who create them.</p>
        </div>
        <div class="reveal border-t border-ink/20 pt-8 md:border-l md:border-t-0 md:pl-10 md:pt-0">
            <x-section-label label="Our vision" variant="inverse" />
            <h2 class="serif mt-4 text-4xl">A more thoughtful industry.</h2>
            <p class="mt-5 max-w-lg text-base leading-8 text-ink/75">We believe a better future for textiles is built through lasting relationships, informed choices and a commitment to keep learning.</p>
        </div>
    </div>
</section>
<section class="bg-ivory px-5 py-8 sm:px-6 lg:px-8 lg:py-12">
    <div class="mx-auto max-w-7xl">
        <div class="reveal max-w-3xl">
            <x-section-label label="Our approach" />
            <h2 class="serif mt-4 text-4xl text-ink sm:text-2xl">Excellence lives in the process.</h2>
        </div>
        <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">@foreach([['01','Material knowledge','We learn the nature of a fibre before asking it to become something new.'],['02','Thoughtful design','Utility, comfort and lasting character guide each design decision.'],['03','Skilled making','Our partnerships recognise skill and encourage shared learning.'],['04','Quality, always','Attention at every stage lets the final details feel effortless.']] as $step)<article class="reveal rounded-3xl border border-ink/10 bg-sand p-6"><span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-brass text-xs font-semibold text-white">{{ $step[0] }}</span>
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
            <p class="mt-5 text-base leading-8 text-muted">We keep improving how we source, sample and produce. Our commitment is practical: ask better questions, make considered choices and work with partners who share our care for quality.</p><a href="/contact" class="mt-7 inline-flex items-center gap-2 rounded-full bg-brass px-6 py-3.5 text-sm font-semibold text-ivory">Talk to our team <x-icon name="arrow-up-right" class="anim-cta-arrow h-4 w-4" /></a>
        </div>
    </div>
</section>
<section class="bg-ivory px-5 py-8 text-center sm:px-6 lg:px-8 lg:py-12">
    <div class="reveal mx-auto max-w-3xl">
        <x-section-label label="Work with us" />
        <h2 class="serif mt-4 text-4xl text-ink sm:text-2xl">Good work starts with a conversation.</h2><a href="/contact" class="mt-7 inline-flex items-center gap-3 rounded-full bg-brass px-7 py-4 text-sm font-semibold text-white transition hover:bg-brass-soft">Get in touch <x-icon name="arrow-up-right" class="anim-cta-arrow h-4 w-4" /></a>
    </div>
</section>
@endsection