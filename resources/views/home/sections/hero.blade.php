{{-- Hero --}}
<section id="home-hero" data-premium-hero class="relative flex min-h-[500px] items-end overflow-hidden bg-[#ffe28c70] pt-28 sm:min-h-[650px]" role="region" aria-roledescription="carousel" aria-label="Nivritti textile stories">
    <div data-hero-media class="absolute inset-0">
        <img data-hero-slide src="{{ asset('images/hero/images (1).jpeg') }}" alt="Two Nivritti workers in orange headscarves at their machines" class="absolute inset-0 h-full w-full object-cover object-center opacity-100 transition-opacity duration-1000">
        <img data-hero-slide src="{{ asset('images/hero/images.jpeg') }}" alt="A long row of sewing stations inside the Nivritti workshop" class="absolute inset-0 h-full w-full object-cover object-center opacity-0 transition-opacity duration-1000" aria-hidden="true">
        <img data-hero-slide src="{{ asset('images/hero/5.jpg') }}" alt="Nivritti garment production floor with rows of sewing stations" class="absolute inset-0 h-full w-full object-cover object-center opacity-0 transition-opacity duration-1000" aria-hidden="true">
    </div>
    <div class="pointer-events-none absolute inset-0 bg-gradient-to-r from-ink/90 via-ink/55 to-ink/10"></div>
    <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-ink/65 via-transparent to-ink/10"></div>
    <svg class="needle-thread absolute right-0 top-0 z-[1] hidden h-full w-[68%] text-brass/80 sm:block" viewBox="0 0 1000 680" preserveAspectRatio="none" aria-hidden="true">
        <path data-thread-path d="M650 20C850 70 920 145 850 245S680 375 790 465s150 125 70 195" fill="none" stroke="currentColor" stroke-width="1.1" stroke-dasharray="3 9" stroke-linecap="round" />
        <g data-thread-needle visibility="hidden">
            <path d="M-17 0 11 0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            <path d="m11 0 7 0-5 3" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" />
            <circle cx="-11" cy="0" r="1.4" fill="none" stroke="currentColor" stroke-width="1" />
        </g>
    </svg>
    
    <div class="relative mx-auto w-full max-w-7xl px-5 pb-12 pt-10 text-ivory sm:px-6 sm:pb-10 lg:px-8 lg:pb-8">
        <p class="reveal mb-3 flex items-center gap-3 text-[10px] font-medium uppercase tracking-[.3em] text-brass-light sm:text-xs">Nivritti · Indian textile craftsmanship</p>
        
        <h1 class="reveal serif max-w-3xl text-3xl font-normal leading-tight tracking-tight sm:text-4xl lg:text-5xl">Made of craft.<br><em class="font-normal">Made for tomorrow.</em></h1>
        
        <div class="mt-4 flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
            <p class="reveal max-w-lg text-xs leading-6 text-ivory/85 sm:text-sm">We bring thoughtful design, responsible making and the quiet beauty of textiles together.</p>
            <div class="reveal flex flex-wrap gap-3">
                <a href="/catalog" class="inline-flex items-center gap-3 rounded-full bg-gradient-to-r from-[#D99A16] via-[#E8B52F] to-[#D49A16] px-5 py-3 text-xs font-semibold text-ink transition hover:bg-gradient-to-r from-[#D99A16] via-[#E8B52F] to-[#D49A16]-deep sm:text-sm">Explore Our Collections <x-icon name="arrow-up-right" class="anim-cta-arrow h-4 w-4" /></a>
                <a href="/about" class="inline-flex items-center rounded-full border border-ivory/50 px-5 py-3 text-xs text-ivory transition hover:border-brass hover:bg-ivory/10 sm:text-sm">Our Story</a>
            </div>
        </div>
        <div class="mt-6 flex flex-wrap items-center justify-between gap-4 sm:mt-8">
            <div data-hero-scroll class="flex items-center gap-3 text-[10px] uppercase tracking-[.24em] text-ivory/70"><span class="h-px w-12 bg-ivory/60"></span> Scroll to discover</div>
            <div class="flex items-center gap-2" role="group" aria-label="Choose hero image">
                <button type="button" data-hero-prev class="flex h-8 w-8 items-center justify-center rounded-full border border-ivory/25 text-ivory transition hover:border-brass hover:bg-gradient-to-r from-[#D99A16] via-[#E8B52F] to-[#D49A16] hover:text-ink" aria-label="Previous hero image">
                    <x-icon name="chevron-left" class="h-4 w-4" />
                </button>
                <span data-hero-current class="text-[10px] font-semibold tabular-nums text-brass-light" aria-hidden="true">01</span>
                <div class="flex items-center gap-2">
                    <button type="button" data-hero-dot="0" class="h-1 w-8 bg-ivory transition-all" aria-label="Show slide 1" aria-current="true"></button>
                    <button type="button" data-hero-dot="1" class="h-1 w-4 bg-ivory/25 transition-all" aria-label="Show slide 2" aria-current="false"></button>
                    <button type="button" data-hero-dot="2" class="h-1 w-4 bg-ivory/25 transition-all" aria-label="Show slide 3" aria-current="false"></button>
                </div>
                <span class="text-[10px] tabular-nums text-ivory/50" aria-hidden="true">03</span>
                <button type="button" data-hero-next class="flex h-8 w-8 items-center justify-center rounded-full border border-ivory/25 text-ivory transition hover:border-brass hover:bg-gradient-to-r from-[#D99A16] via-[#E8B52F] to-[#D49A16] hover:text-ink" aria-label="Next hero image">
                    <x-icon name="chevron-right" class="h-4 w-4" />
                </button>
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
        const previousButton = hero.querySelector('[data-hero-prev]');
        const nextButton = hero.querySelector('[data-hero-next]');
        const currentLabel = hero.querySelector('[data-hero-current]');
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
            if (currentLabel) currentLabel.textContent = String(currentSlide + 1).padStart(2, '0');
        };

        dots.forEach((dot, index) => dot.addEventListener('click', () => showSlide(index)));
        previousButton?.addEventListener('click', () => showSlide(currentSlide - 1));
        nextButton?.addEventListener('click', () => showSlide(currentSlide + 1));
        showSlide(0);

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