@extends('layouts.app')
@section('title', 'About Nivritti | Our story and approach')
@section('content')


<!-- <section class="overflow-hidden bg-[#edf1f7]">
    <div class="mx-auto grid max-w-[1500px] gap-8 px-5 py-12 sm:px-6 sm:py-14 lg:min-h-[620px] lg:grid-cols-[1.08fr_.92fr] lg:items-center lg:gap-10 lg:py-20 lg:pl-[max(2.5rem,calc((100vw-1320px)/2))] lg:pr-0">
        <div class="reveal">
            <p class="inline-flex items-center gap-3 rounded-full border border-slate-300 px-4 py-2 text-xs font-medium uppercase tracking-[.16em] text-slate-800"><span class="h-2 w-2 bg-[#e8cf43]"></span> Our approach</p>
            <h2 class="mt-5 max-w-3xl text-4xl font-semibold leading-[1.12] tracking-tight text-[#102840] sm:text-5xl lg:text-6xl">Tradition, carried forward with care.</h2>
            <p class="mt-5 max-w-2xl text-base leading-8 text-slate-600">Our work connects textile knowledge with contemporary design. We collaborate closely with skilled makers and keep quality in view from material selection through the final finish.</p>
            <div class="mt-7 grid max-w-2xl gap-x-8 gap-y-4 sm:grid-cols-2">@foreach(['Material-first thinking','Skilled maker partnerships','Detailed quality checks','Considered garment finishing'] as $point)<p class="flex items-center gap-3 text-sm font-medium text-[#102840]"><span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-[#f5df60] text-xs">✓</span>{{ $point }}</p>@endforeach</div>
            <div class="mt-8 grid max-w-2xl gap-5 border-t border-slate-300 pt-6 sm:grid-cols-2">
                <div class="flex items-center gap-4"><span class="flex h-14 w-14 shrink-0 items-center justify-center bg-[#102840] text-[#f5df60]" aria-hidden="true"><svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="m4 7 8-4 8 4-8 4-8-4Z"></path>
                            <path d="m4 12 8 4 8-4M4 17l8 4 8-4"></path>
                        </svg></span><span class="text-sm font-medium leading-6 text-[#102840]">Collaborative design<br>partnerships</span></div>
                <div class="flex items-center gap-4"><span class="flex h-14 w-14 shrink-0 items-center justify-center bg-[#102840] text-[#f5df60]" aria-hidden="true"><svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M4 4h16v5H4zM7 9v11m10-11v11M4 20h16M9 13h6"></path>
                        </svg></span><span class="text-sm font-medium leading-6 text-[#102840]">Textile development<br>and finishing</span></div>
            </div><a href="/contact" class="mt-7 inline-flex items-center gap-3 rounded-full bg-[#f4df69] px-7 py-4 text-sm font-semibold text-[#102840] transition hover:bg-[#e8cf43]">Talk with our team <span aria-hidden="true">→</span></a>
        </div>
        <div class="relative min-h-[460px] sm:min-h-[560px] lg:min-h-[610px]">
            <div class="image-zoom reveal absolute right-0 top-0 h-[88%] w-[76%] overflow-hidden rounded-l-[4rem] bg-slate-200 sm:w-[78%]"><img src="{{ asset('images/hero/hero-bg2.jpg') }}" alt="Textile rolls and machinery inside a production workshop" class="h-full w-full object-cover" loading="lazy"></div>
            <div class="image-zoom reveal absolute bottom-0 left-0 h-[47%] w-[43%] overflow-hidden rounded-[2.5rem] border-[10px] border-[#edf1f7] bg-slate-200"><img src="{{ asset('images/hero/hero-bg3.jpg') }}" alt="Worker carefully inspecting fabric at a textile mill" class="h-full w-full object-cover" loading="lazy"></div>
        </div>
    </div>
</section> -->
<section class="mx-auto grid max-w-7xl gap-8 px-5 py-12 sm:px-6 md:py-16 lg:grid-cols-2 lg:items-center lg:gap-10 lg:px-8 lg:py-20">
    <div class="reveal">
        <p class="text-xs uppercase tracking-[.25em] text-[#a35d45]">Our story</p>
        <h2 class="serif mt-4 text-4xl sm:text-5xl">Rooted in craft.<br>Open to possibility.</h2>
        <p class="mt-6 text-sm leading-7 text-stone-600">Nivritti grew from a simple belief: that textiles can be beautiful, useful and considered all at once. We bring together a deep respect for traditional skill and a clear eyed view of how people live today.</p>
        <p class="mt-4 text-sm leading-7 text-stone-600">Our studio works closely with makers and partners, sharing knowledge from early material exploration through final finishing. Each collection is an invitation to look closer.</p>
    </div>
    <div class="image-zoom reveal h-[440px] overflow-hidden"><img src="{{ asset('images/about/about-hero.jpg') }}" alt="Nivritti production floor with rows of sewing stations" class="h-full w-full object-cover" loading="lazy"></div>
</section>
<section class="bg-[#F5F7FC] px-5 py-12 sm:px-6 md:py-16 lg:px-8  border rounded-2xl lg:py-20" aria-labelledby="about-principles-title">
    <div class="mx-auto max-w-7xl">
        <div class="reveal max-w-3xl">
            <p class="text-xs uppercase tracking-[.25em] text-[#102840]">What guides our work</p>
            <h2 id="about-principles-title" class="serif mt-4 text-4xl text-[#102840] sm:text-5xl">Care in every choice.</h2>
            <p class="mt-5 max-w-2xl text-sm leading-7 text-slate-600">From the first fibre to the final finish, we bring the same care to our materials, our partnerships and the pieces we make together.</p>
        </div>
        <div class="mt-9 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach([
            ['01', 'Materials with purpose', 'We choose fibres and constructions for their feel, function and lasting usefulness.'],
            ['02', 'People at every stage', 'We value the knowledge of makers and build strong relationships through shared work.'],
            ['03', 'Quality that lasts', 'Careful checks and considered finishing help every piece meet the standard we set.'],
            ] as $principle)
            <article class="reveal rounded-3xl border border-slate-200 bg-[#edf1f7] p-6 sm:p-7">
                <span class="text-xs font-semibold tracking-[.16em] text-[#102840]">{{ $principle[0] }}</span>
                <h3 class="serif mt-7 text-2xl text-[#102840]">{{ $principle[1] }}</h3>
                <p class="mt-3 text-sm leading-6 text-slate-600">{{ $principle[2] }}</p>
            </article>
            @endforeach
        </div>
    </div>
</section>
<section class="bg-[#F5F7FC] px-5 py-12 text-black sm:px-6 lg:px-8 lg:py-20">
    <div class="mx-auto grid max-w-7xl gap-8 md:grid-cols-2 lg:px-4">
        <div class="reveal">
            <p class="text-xs uppercase tracking-[.25em] text-[#d59a7e]">Our mission</p>
            <h2 class="serif mt-4 text-4xl">Make with intention.</h2>
            <p class="mt-5 max-w-lg text-sm leading-7 text-black/65">We make textiles that respect their material, serve their purpose and honour the knowledge of the people who create them.</p>
        </div>
        <div class="reveal border-t border-white/20 pt-8 md:border-l md:border-t-0 md:pl-10 md:pt-0">
            <p class="text-xs uppercase tracking-[.25em] text-[#d59a7e]">Our vision</p>
            <h2 class="serif mt-4 text-4xl">A more thoughtful industry.</h2>
            <p class="mt-5 max-w-lg text-sm leading-7 text-black/65">We believe a better future for textiles is built through lasting relationships, informed choices and a commitment to keep learning.</p>
        </div>
    </div>
</section>
<section class="mx-auto max-w-7xl px-5 py-12 sm:px-6 lg:px-8 lg:py-20">
    <div class="reveal max-w-3xl">
        <p class="text-xs uppercase tracking-[.25em] text-[#a35d45]">Our approach</p>
        <h2 class="serif mt-4 text-4xl sm:text-5xl">Excellence lives in the process.</h2>
    </div>
    <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">@foreach([['01','Material knowledge','We learn the nature of a fibre before asking it to become something new.'],['02','Thoughtful design','Utility, comfort and lasting character guide each design decision.'],['03','Skilled making','Our partnerships recognise skill and encourage shared learning.'],['04','Quality, always','Attention at every stage lets the final details feel effortless.']] as $step)<article class="reveal border-t border-stone-300 pt-5"><span class="text-xs text-[#a35d45]">{{ $step[0] }}</span>
            <h3 class="serif mt-5 text-2xl">{{ $step[1] }}</h3>
            <p class="mt-3 text-sm leading-6 text-stone-600">{{ $step[2] }}</p>
        </article>@endforeach</div>
</section>
<section class="grid bg-[#eeebe4] lg:grid-cols-2">
    <div class="image-zoom min-h-[360px] overflow-hidden lg:min-h-[460px]"><img src="{{ asset('images/hero/hero-bg3.jpg') }}" alt="Fabric maker at work" class="h-full w-full object-cover" loading="lazy"></div>
    <div class="reveal flex items-center px-5 py-12 sm:px-10 lg:px-14">
        <div>
            <p class="text-xs uppercase tracking-[.25em] text-[#a35d45]">Quality & responsibility</p>
            <h2 class="serif mt-4 text-4xl">Better choices, made every day.</h2>
            <p class="mt-5 text-sm leading-7 text-stone-600">We keep improving how we source, sample and produce. Our commitment is practical: ask better questions, make considered choices and work with partners who share our care for quality.</p><a href="/contact" class="mt-7 inline-flex border-b border-stone-400 pb-2 text-sm">Talk to our team ↗</a>
        </div>
    </div>
</section>
<section class="px-5 py-12 text-center sm:px-6 lg:px-8 lg:py-20">
    <div class="reveal mx-auto max-w-3xl">
        <p class="text-xs uppercase tracking-[.25em] text-[#a35d45]">Work with us</p>
        <h2 class="serif mt-4 text-4xl sm:text-5xl">Good work starts with a conversation.</h2><a href="/contact" class="mt-7 inline-flex bg-[#a35d45] px-7 py-4 text-sm text-white hover:bg-[#874a36]">Get in touch ↗</a>
    </div>
</section>
@endsection