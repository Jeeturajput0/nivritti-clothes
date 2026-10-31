{{-- Introduction --}}
<style>
    /* Introduction — editorial masked reveal */
    #about-intro .intro-heading {
        opacity: 1;
        transform: none;
        transition: none;
    }

    #about-intro .heading-line {
        display: inline;
        white-space: nowrap;
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

    @media (max-width: 1023px) {
        #about-intro .heading-line {
            white-space: normal;
        }
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

<section
    id="about-intro"
    class="relative overflow-hidden rounded-[2rem] bg-transparent py-8 md:py-10">
    <span
        data-stitch-divider
        class="stitch-divider"
        aria-hidden="true"></span>

    <div
        class="mx-auto max-w-7xl overflow-hidden rounded-[2rem] border border-ink/10 bg-sand px-4 py-5 shadow-[0_18px_45px_-30px_rgba(27,25,21,0.28)] sm:px-6 sm:py-6 lg:px-8 lg:py-8">

        <div class="grid gap-8 lg:grid-cols-[1.02fr_.98fr] lg:items-center lg:gap-12">

            {{-- Editorial copy --}}
            <div class="relative z-10 order-2 w-full lg:order-1">

                <x-section-label
                    label="About us"
                    data-intro-label />

                <h2
                    class="intro-heading serif mt-4 w-full text-2xl text-ink sm:text-3xl lg:text-4xl"
                    aria-label="Where tradition meets modern Nivritti craftsmanship.">
                    <span
                        class="heading-line"
                        aria-hidden="true">
                        <span class="word-mask">
                            <span class="heading-word">Where</span>
                        </span>

                        <span class="word-mask">
                            <span class="heading-word">tradition</span>
                        </span>

                        <span class="word-mask">
                            <span class="heading-word">meets</span>
                        </span>

                        <span class="word-mask">
                            <span class="heading-word">modern</span>
                        </span>

                        <span class="word-mask">
                            <span class="heading-word">Nivritti</span>
                        </span>

                        <span class="word-mask">
                            <span class="heading-word">craftsmanship.</span>
                        </span>
                    </span>
                </h2>

                <p
                    data-intro-description
                    class="mt-5 max-w-3xl text-base leading-8 text-muted lg:text-lg">
                    At Nivritti, traditional textile knowledge meets contemporary design.
                    We work with considered materials and skilled makers to create apparel
                    with thoughtful details, careful quality checks and lasting appeal.
                </p>

                {{-- Feature checklist --}}
                <div class="mt-6 grid max-w-3xl grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">

                    @foreach([
                    'Thoughtful material selection',
                    'Careful quality inspection',
                    'Textile development expertise',
                    'Experienced craft partners'
                    ] as $point)

                    <p
                        data-intro-point
                        class="flex items-center gap-3 rounded-full border border-ink/10 bg-ivory/80 px-4 py-2.5 text-sm font-medium text-ink sm:text-base">
                        <span
                            class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-white text-xs font-bold text-ink">
                            ✓
                        </span>

                        {{ $point }}
                    </p>

                    @endforeach

                </div>

                {{-- Editorial feature blocks --}}
                <div
                    class="mt-8 grid max-w-3xl gap-6 border-t border-ink/15 pt-6 sm:grid-cols-2 sm:gap-5">

                    <div
                        data-intro-feature
                        class="flex items-center gap-4 rounded-2xl border border-ink/10 bg-ivory/80 p-4">
                        <span
                            class="flex h-16 w-16 shrink-0 items-center justify-center rounded-xl bg-ink text-white"
                            aria-hidden="true">
                            <svg
                                class="h-8 w-8"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.4">
                                <path d="m4 7 8-4 8 4-8 4-8-4Z"></path>
                                <path d="m4 12 8 4 8-4M4 17l8 4 8-4"></path>
                            </svg>
                        </span>

                        <span class="text-base font-medium leading-7 text-ink">
                            Collaborative Design<br>
                            Partnerships
                        </span>
                    </div>

                    <div
                        data-intro-feature
                        class="flex items-center gap-4 rounded-2xl border border-ink/10 bg-ivory/80 p-4">
                        <span
                            class="flex h-16 w-16 shrink-0 items-center justify-center rounded-xl bg-ink text-white"
                            aria-hidden="true">
                            <svg
                                class="h-8 w-8"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.4">
                                <path d="M4 4h16v5H4zM7 9v11m10-11v11M4 20h16M9 13h6"></path>
                                <path d="M7 2v2m10-2v2"></path>
                            </svg>
                        </span>

                        <span class="text-base font-medium leading-7 text-ink">
                            Textile Development<br>
                            &amp; Finishing
                        </span>
                    </div>

                </div>

                {{-- CTA and contact --}}
                <div class="mt-7 flex flex-wrap items-center gap-x-7 gap-y-5">

                    <a
                        href="/about"
                        data-intro-cta
                        class="group inline-flex items-center gap-4 rounded-full bg-ink px-7 py-4 text-sm font-bold uppercase text-ivory transition duration-300 ease-out hover:-translate-y-0.5 hover:bg-brass hover:text-ink">
                        Explore more

                        <span class="inline-block transition-transform duration-300 group-hover:translate-x-1">
                            →
                        </span>
                    </a>

                    <div
                        data-intro-contact
                        class="flex items-center gap-3 rounded-full border border-ink/10 bg-ivory/80 px-4 py-2.5 text-ink">
                        <span
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full border border-ink/30"
                            aria-hidden="true">
                            <svg
                                class="h-5 w-5"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.6">
                                <path d="M6.6 3.5 9 3l2 4.8-2 1.4a15 15 0 0 0 5.8 5.8l1.4-2 4.8 2-.5 2.4a2 2 0 0 1-2 1.6A15.5 15.5 0 0 1 5 5.5a2 2 0 0 1 1.6-2Z"></path>
                            </svg>
                        </span>

                        <span>
                            <span class="block text-sm text-muted">
                                For enquiries
                            </span>

                            <span class="mt-1 block text-lg font-semibold">
                                +91 XXX XXX XXXX
                            </span>
                        </span>
                    </div>

                </div>

            </div>

            {{-- Editorial image --}}
            <div class="order-1 lg:order-2">

                <div
                    data-intro-image
                    class="story-image image-zoom relative h-[380px] overflow-hidden rounded-[2rem] bg-sand sm:h-[500px] lg:h-[560px]">

                    <img
                        src="{{ asset('images/about/about-hero.jpg') }}"
                        alt="Nivritti makers working across rows of sewing machines inside the workshop"
                        class="h-full w-full object-cover"
                        loading="lazy">

                    <div
                        class="pointer-events-none absolute inset-0 bg-gradient-to-t from-ink/25 via-transparent to-transparent"
                        aria-hidden="true"></div>

                    <div
                        class="absolute left-5 top-5 rounded-full border border-ivory/60 bg-ink/70 px-3 py-1.5 text-[10px] font-semibold uppercase tracking-[.18em] text-ivory sm:left-6 sm:top-6">
                        Crafted with care
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
