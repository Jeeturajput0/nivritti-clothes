{{-- Featured Collection --}}
<section class="bg-[#ffe28c70] px-5 py-7 rounded-[2.5rem] sm:px-6 lg:px-8 lg:py-9">
    <div class="mx-auto max-w-7xl rounded-[2.5rem]">

        <a
            href="/catalog"
            class="group relative block overflow-hidden rounded-[2.5rem]"
        >
            <img
                src="{{ asset('images/collections/collage.png') }}"
                alt="Nivritti Collection"
                class="h-[420px] w-full rounded-[2.5rem] object-cover
                transition-transform duration-700
                group-hover:scale-[1.03]
                sm:h-[500px]
                lg:h-[560px]"
                loading="lazy"
            >

            <div
                class="absolute inset-0 rounded-[2.5rem]
                bg-gradient-to-t from-ink/75 via-ink/20 to-transparent"
            ></div>

            <div
                class="absolute bottom-0 left-0 p-6 text-ivory
                sm:p-10 lg:p-12"
            >
                <p class="text-[10px] font-semibold uppercase tracking-[.28em] text-brass-light sm:text-xs">
                    Nivritti Edit
                </p>

                <h2 class="serif mt-2 text-4xl leading-tight sm:text-5xl lg:text-6xl">
                    Everyday Elegance
                </h2>

                <p class="mt-3 max-w-lg text-sm leading-6 text-white/90 sm:text-base">
                    Easy silhouettes with expressive Indian prints and refined finishing.
                </p>

                <span
                    class="mt-5 inline-flex items-center gap-3 rounded-full
                    bg-brass px-6 py-3.5 text-sm font-semibold text-white
                    transition-all duration-300
                    group-hover:-translate-y-1"
                >
                    Explore Collection
                    <x-icon name="arrow-up-right" class="h-4 w-4" />
                </span>
            </div>
        </a>

    </div>
</section>