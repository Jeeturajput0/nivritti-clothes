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
    <x-decorative-botanical variant="branch" class="decor-branch absolute -left-12 top-6 hidden h-[26rem] w-72 text-brass-deep/70 opacity-45 sm:block" />
    <x-decorative-circles class="decor-circles absolute -right-20 top-12 hidden h-72 w-72 text-brass-deep/80 opacity-50 lg:block" />
    <span
        data-stitch-divider
        class="stitch-divider"
        aria-hidden="true"></span>

    {{-- Main bordered container --}}
    <div
        class="relative z-10 mx-auto max-w-7xl overflow-hidden rounded-[2rem] border border-ink/10 bg-[#ffe28c70] px-4 py-5 shadow-[0_18px_45px_-30px_rgba(27,25,21,0.28)] sm:px-6 sm:py-6 lg:px-8 lg:py-8">

        {{-- EXACT 50 / 50 --}}
        <div
            class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:items-center lg:gap-10">

            {{-- =========================
                 LEFT — TEXT 50%
            ========================== --}}
            <div
                class="relative z-10 order-2 w-full lg:order-1">

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
                    </span>
                    <span class="heading-line" aria-hidden="true">
                        <span class="word-mask">
                            <span class="heading-word">modern</span>
                        </span>

                        <span class="">
                            <span class="heading-word font-['Cormorant_Garamond'] italic font-semibold text-[#C58A18]">Nivritti</span>
                        </span>
                        <span class="word-mask">
                            <span class="heading-word">craftsmanship.</span>
                        </span>
                    </span>
                </h2>

                <p
                    data-intro-description
                    class="mt-5 max-w-3xl text-base leading-6 text-muted lg:text-lg">
                    At Nivritti, timeless textile traditions meet modern design
                    sensibilities. From thoughtful fabric sourcing through final
                    production, we work with skilled makers to create apparel
                    with careful quality checks and lasting appeal.
                </p>

                {{-- Feature checklist --}}
                <div
                    class="mt-6  text-white grid max-w-3xl grid-cols-1  gap-x-6 gap-y-4 sm:grid-cols-2">
                    @foreach([
                    'Thoughtful material selection',
                    'Careful quality inspection',
                    'Textile development expertise',
                    'Experienced craft partners'
                    ] as $point)

                    <p
                        data-intro-point
                        class="flex items-center gap-2 rounded-full  border border-ink/10 bg-gradient-to-r from-[#D99A16] via-[#E8B52F] to-[#D49A16] px-4 py-2.5 text-sm font-medium text-white sm:text-base">
                        <span
                            class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-white text-xs font-bold text-ink">
                            ✓
                        </span>

                        {{ $point }}
                    </p>

                    @endforeach
                </div>

              
                {{-- Feature blocks --}}
                <div
                    class="mt-5 grid max-w-3xl grid-cols-1 gap-3 sm:grid-cols-2">

                    {{-- Feature 1 --}}
                    <div
                        data-intro-feature
                        class="group flex min-h-[82px] items-center gap-4
        rounded-xl border border-ink/10 bg-white
        px-4 py-3.5
        transition-all duration-300
        hover:-translate-y-1 hover:border-brass/40
        hover:bg-white hover:shadow-[0_12px_30px_-20px_rgba(16,40,64,0.25)]">

                        <span
                            class="flex h-11 w-11 shrink-0 items-center justify-center
            rounded-lg bg-gradient-to-r from-[#D99A16] via-[#E8B52F] to-[#D49A16] text-white
            transition-transform duration-300
            group-hover:scale-105"
                            aria-hidden="true">
                            <svg
                                class="h-5 w-5"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5">
                                <path d="m4 7 8-4 8 4-8 4-8-4Z"></path>
                                <path d="m4 12 8 4 8-4M4 17l8 4 8-4"></path>
                            </svg>
                        </span>

                        <div>
                            <p class="text-sm font-semibold leading-5 text-ink">
                                Collaborative Design
                            </p>

                            <p class="mt-0.5 text-xs leading-5 text-muted">
                                Partnerships
                            </p>
                        </div>

                    </div>


                    {{-- Feature 2 --}}
                    <div
                        data-intro-feature
                        class="group flex min-h-[82px] items-center gap-4
        rounded-xl border border-ink/10 bg-white
        px-4 py-3.5
        transition-all duration-300
        hover:-translate-y-1 hover:border-brass/40
        hover:bg-white hover:shadow-[0_12px_30px_-20px_rgba(16,40,64,0.25)]">

                        <span
                            class="flex h-11 w-11 shrink-0 items-center justify-center
            rounded-lg bg-gradient-to-r from-[#D99A16] via-[#E8B52F] to-[#D49A16] text-white
            transition-transform duration-300
            group-hover:scale-105"
                            aria-hidden="true">
                            <svg
                                class="h-5 w-5"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5">
                                <path d="M4 4h16v5H4zM7 9v11m10-11v11M4 20h16M9 13h6"></path>
                                <path d="M7 2v2m10-2v2"></path>
                            </svg>
                        </span>

                        <div>
                            <p class="text-sm font-semibold leading-5 text-ink">
                                Textile Development
                            </p>

                            <p class="mt-0.5 text-xs leading-5 text-muted">
                                &amp; Finishing
                            </p>
                        </div>

                    </div>

                </div>
                {{-- CTA + Contact --}}
                <div class="mt-7 flex flex-wrap items-center gap-x-7 gap-y-5">

                    {{-- Explore Button --}}
                    <a
                        href="/about"
                        data-intro-cta
                        class="group inline-flex items-center gap-4 rounded-full bg-gradient-to-r from-[#D99A16] via-[#E8B52F] to-[#D49A16] px-7 py-4 text-sm font-bold uppercase text-white transition duration-300 ease-out hover:-translate-y-0.5 hover:bg-gradient-to-r from-[#D99A16] via-[#E8B52F] to-[#D49A16] hover:text-ink">
                        Explore more

                        <span
                            class="inline-block transition-transform duration-300 group-hover:translate-x-1">
                            →
                        </span>
                    </a>


                    {{-- Enquiry Box --}}
                    <div
                        data-intro-contact
                        class="flex min-w-[250px] items-center gap-3 rounded-full border border-ink/10 bg-white px-4 py-2 text-ink">

                        {{-- Smaller Icon --}}
                        <span
                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-gradient-to-r from-[#D99A16] via-[#E8B52F] to-[#D49A16] text-white"
                            aria-hidden="true">
                            <svg
                                class="h-4 w-4"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.6">
                                <path d="M6.6 3.5 9 3l2 4.8-2 1.4a15 15 0 0 0 5.8 5.8l1.4-2 4.8 2-.5 2.4a2 2 0 0 1-2 1.6A15.5 15.5 0 0 1 5 5.5a2 2 0 0 1 1.6-2Z"></path>
                            </svg>
                        </span>

                        {{-- Text --}}
                        <span class="pr-3">
                            <span class="block text-xs text-muted">
                                For enquiries
                            </span>

                            <span class="mt-0.5 block whitespace-nowrap text-base font-semibold text-ink">
                                +91 XXX XXX XXXX
                            </span>
                        </span>

                    </div>

                </div>

            </div>


            {{-- =========================
                 RIGHT — IMAGE 50%
            ========================== --}}
            <div
                class="order-1 w-full lg:order-2">

                <div
                    data-intro-image
                    class="story-image image-zoom relative h-[400px] w-full overflow-hidden rounded-[2rem] bg-sand sm:h-[500px] lg:h-[560px]">

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

                    <div
                        data-intro-image-secondary
                        class="image-zoom absolute bottom-5 right-5 h-28 w-24 overflow-hidden rounded-2xl border-2 border-ivory shadow-xl sm:bottom-7 sm:right-7 sm:h-40 sm:w-32">
                        <img
                            src="{{ asset('images/about/about-1.jpg') }}"
                            alt="A closer look at Nivritti textile craftsmanship"
                            class="h-full w-full object-cover"
                            loading="lazy">
                    </div>

                    <div class="absolute bottom-8 right-28 h-20 w-20 overflow-hidden rounded-full border-2 border-brass bg-sand shadow-xl sm:bottom-12 sm:right-36 sm:h-28 sm:w-28">
                        <img
                            src="{{ asset('images/process/choose-2.jpg') }}"
                            alt=""
                            class="h-full w-full object-cover"
                            loading="lazy">
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>