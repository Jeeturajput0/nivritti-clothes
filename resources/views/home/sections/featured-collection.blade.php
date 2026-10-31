{{-- Featured Collection --}}
<section class="relative overflow-hidden bg-[#ffe28c70] px-5 py-8 sm:px-6 lg:px-8 lg:py-10" aria-label="Featured collection">

    {{-- Decorative background --}}
    <x-decorative-botanical
        variant="flower"
        class="pointer-events-none absolute -left-10 top-0 hidden h-80 w-56 text-brass-deep/50 opacity-40 sm:block" />

    <x-decorative-circles
        class="pointer-events-none absolute -right-20 top-2 hidden h-72 w-72 text-brass-deep/40 opacity-40 lg:block" />

    {{-- Collection Card --}}
    <a
        href="/catalog"
        class="group relative z-10 mx-auto block max-w-7xl overflow-hidden rounded-[2rem] bg-ink shadow-[0_20px_60px_-25px_rgba(7,26,46,.35)]">

        {{-- Main Image --}}
        <div class="image-zoom relative h-[380px] overflow-hidden sm:h-[460px] lg:h-[520px]">

            <img
                src="{{ asset('images/collections/collage.png') }}"
                alt="Nivritti's latest textile collection"
                class="h-full w-full object-cover transition-transform duration-1000 ease-out group-hover:scale-[1.03]"
                loading="lazy">

            {{-- Image Overlay --}}
            <div
                class="absolute inset-0 bg-gradient-to-t from-ink/85 via-ink/25 to-transparent"
                aria-hidden="true"></div>

            {{-- Content --}}
            <div class="absolute inset-x-0 bottom-0 p-6 text-ivory sm:p-10 lg:p-12">

                <p class="text-[10px] font-semibold uppercase tracking-[.28em] text-brass-light sm:text-xs">
                    Nivritti Edit
                </p>

                <h2 class="serif mt-2 max-w-3xl text-4xl leading-[1.05] sm:text-5xl lg:text-6xl">
                    Everyday Elegance
                </h2>

                <p class="mt-3 max-w-xl text-sm leading-6 text-white/90 sm:text-base">
                    A perfect blend of tradition and modern style for every occasion.
                </p>

                <span
                    class="mt-5 inline-flex items-center gap-3 rounded-full bg-brass px-6 py-3.5 text-sm font-semibold text-white transition-all duration-300 group-hover:-translate-y-1 group-hover:bg-brass-light">
                    Shop the Collection

                    <x-icon
                        name="arrow-up-right"
                        class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />
                </span>

            </div>

        </div>

    </a>

</section>