{{-- =========================================================
    WHY TRUST GLOBAL BRANDS — rebuilt (no GSAP dependency)
    Images slide LEFT ➜ RIGHT via CSS transitions + IntersectionObserver
========================================================= --}}

<style>
    /* =========================================================
       WHY TRUST GLOBAL BRANDS
    ========================================================= */

    #trust-section {
        overflow: hidden;
        background: var(--color-sand);
        margin-top: 8px;
        margin-bottom: 8px;
        padding-top: 48px;
        padding-bottom: 48px;
    }

    /* -------------------------
       Reveal base — CSS transition driven
    ------------------------- */

    #trust-section .trust-anim {
        transition:
            opacity 1s cubic-bezier(.16, 1, .3, 1),
            transform 1.1s cubic-bezier(.16, 1, .3, 1),
            filter 1s cubic-bezier(.16, 1, .3, 1);
        will-change: transform, opacity, filter;
    }

    /* -------------------------
       Main image — slides LEFT ➜ RIGHT
    ------------------------- */

    #trust-section .trust-image-main {
        opacity: 0;
        transform: translateX(-90px) scale(.96);
        filter: blur(8px);
    }

    #trust-section .trust-image-main.is-visible {
        opacity: 1;
        transform: translateX(0) scale(1);
        filter: blur(0);
    }

    /* -------------------------
       Second image — slides LEFT ➜ RIGHT (delayed)
    ------------------------- */

    #trust-section .trust-image-second {
        opacity: 0;
        transform: translateX(-70px) scale(.96);
        filter: blur(7px);
        transition-delay: .15s;
    }

    #trust-section .trust-image-second.is-visible {
        opacity: 1;
        transform: translateX(0) scale(1);
        filter: blur(0);
    }

    /* -------------------------
       Text — slides RIGHT ➜ LEFT (balanced motion)
    ------------------------- */

    #trust-section .trust-content {
        opacity: 0;
        transform: translateX(60px);
        filter: blur(7px);
    }

    #trust-section .trust-content.is-visible {
        opacity: 1;
        transform: translateX(0);
        filter: blur(0);
    }

    /* -------------------------
       Heading words
    ------------------------- */

    #trust-section .trust-heading {
        overflow: hidden;
    }

    #trust-section .trust-heading-line {
        display: block;
        overflow: hidden;
    }

    #trust-section .trust-heading-word {
        display: inline-block;
        opacity: 0;
        transform: translateY(70px);
        filter: blur(8px);
        transition:
            opacity .9s cubic-bezier(.16, 1, .3, 1),
            transform .9s cubic-bezier(.16, 1, .3, 1),
            filter .9s cubic-bezier(.16, 1, .3, 1);
    }

    #trust-section .trust-heading-word.is-visible {
        opacity: 1;
        transform: translateY(0);
        filter: blur(0);
    }

    #trust-section .trust-heading-word:nth-child(2),
    #trust-section .trust-heading-line:nth-child(2) .trust-heading-word {
        transition-delay: .14s;
    }

    /* -------------------------
       Description
    ------------------------- */

    #trust-section .trust-description {
        opacity: 0;
        transform: translateY(25px);
        transition:
            opacity .85s cubic-bezier(.16, 1, .3, 1) .15s,
            transform .85s cubic-bezier(.16, 1, .3, 1) .15s;
    }

    #trust-section .trust-description.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* -------------------------
       Progress bars
    ------------------------- */

    #trust-section .trust-progress-item {
        opacity: 0;
        transform: translateY(25px);
        transition:
            opacity .7s cubic-bezier(.16, 1, .3, 1),
            transform .7s cubic-bezier(.16, 1, .3, 1);
    }

    #trust-section .trust-progress-item.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    #trust-section .trust-progress-item:nth-child(2) {
        transition-delay: .12s;
    }

    #trust-section .trust-progress-item:nth-child(3) {
        transition-delay: .24s;
    }

    #trust-section .trust-progress-track {
        position: relative;
        height: 10px;
        overflow: hidden;
        border-radius: 999px;
        background: var(--color-ivory);
        box-shadow: inset 0 1px 3px rgba(16, 40, 64, .08);
    }

    #trust-section .trust-progress-fill {
        position: absolute;
        inset: 0 auto 0 0;
        width: 0;
        border-radius: 999px;
        background: linear-gradient(90deg, var(--color-brass), var(--color-brass-light));
        transition: width 1.4s cubic-bezier(.16, 1, .3, 1) .25s;
    }

    #trust-section .trust-progress-item.is-visible .trust-progress-fill {
        width: var(--progress, 0%);
    }

    #trust-section .trust-progress-dot {
        position: absolute;
        top: 50%;
        left: var(--progress, 0%);
        width: 11px;
        height: 11px;
        border-radius: 999px;
        background: var(--color-brass);
        transform: translate(-50%, -50%) scale(0);
        transition: transform .45s cubic-bezier(.34, 1.56, .64, 1) 1.4s;
    }

    #trust-section .trust-progress-item.is-visible .trust-progress-dot {
        transform: translate(-50%, -50%) scale(1);
    }

    /* -------------------------
       Checklist
    ------------------------- */

    #trust-section .trust-check-item {
        opacity: 0;
        transform: translateY(20px);
        transition:
            opacity .65s cubic-bezier(.16, 1, .3, 1),
            transform .65s cubic-bezier(.16, 1, .3, 1);
    }

    #trust-section .trust-check-item.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    #trust-section .trust-check-item:nth-child(2) {
        transition-delay: .12s;
    }

    #trust-section .trust-check-item:nth-child(3) {
        transition-delay: .24s;
    }

    #trust-section .trust-check-item:nth-child(4) {
        transition-delay: .36s;
    }

    #trust-section .trust-check-icon {
        transition:
            transform .45s cubic-bezier(.16, 1, .3, 1),
            background-color .3s ease,
            color .3s ease;
    }

    #trust-section .trust-check-item:hover .trust-check-icon {
        transform: scale(1.12) rotate(8deg);
        background: var(--color-brass);
        color: var(--color-ink);
    }

    /* -------------------------
       Image hover
    ------------------------- */

    #trust-section .trust-image-wrapper {
        overflow: hidden;
    }

    #trust-section .trust-image-wrapper img {
        transition:
            transform .9s cubic-bezier(.16, 1, .3, 1);
    }

    #trust-section .trust-image-wrapper:hover img {
        transform: scale(1.045);
    }

    /* -------------------------
       Glass stat card
    ------------------------- */

    #trust-section .trust-stat-card {
        background: rgba(255, 255, 255, .72);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, .85);
        box-shadow: 0 18px 40px -22px rgba(7, 26, 46, .22);
    }

    /* -------------------------
       Yellow floating dot
    ------------------------- */

    #trust-section .trust-dot {
        animation: trustFloat 4s ease-in-out infinite;
    }

    @keyframes trustFloat {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-8px);
        }
    }

    /* -------------------------
       Responsive
    ------------------------- */

    @media (max-width: 1024px) {

        #trust-section .trust-image-main {
            transform: translateY(40px) scale(.97);
        }

        #trust-section .trust-image-main.is-visible {
            transform: translateY(0) scale(1);
        }

        #trust-section .trust-content {
            transform: translateY(40px);
        }

        #trust-section .trust-content.is-visible {
            transform: translateY(0);
        }

    }

    @media (max-width: 640px) {

        #trust-section {
            padding-top: 40px;
            padding-bottom: 40px;
        }

        #trust-section .trust-heading-word {
            transform: translateY(45px);
        }

        #trust-section .trust-image-main,
        #trust-section .trust-image-second {
            border-radius: 18px;
        }

    }

    /* -------------------------
       Safety net — force visible if JS fails
    ------------------------- */

    #trust-section.trust-force-visible .trust-anim,
    #trust-section.trust-force-visible .trust-content,
    #trust-section.trust-force-visible .trust-heading-word,
    #trust-section.trust-force-visible .trust-description,
    #trust-section.trust-force-visible .trust-progress-item,
    #trust-section.trust-force-visible .trust-check-item {
        opacity: 1 !important;
        transform: none !important;
        filter: none !important;
    }

    #trust-section.trust-force-visible .trust-progress-fill {
        width: var(--progress, 0%) !important;
    }

    #trust-section.trust-force-visible .trust-progress-dot {
        transform: translate(-50%, -50%) scale(1) !important;
    }

    /* -------------------------
       Reduced motion
    ------------------------- */

    @media (prefers-reduced-motion: reduce) {

        #trust-section *,
        #trust-section .trust-anim,
        #trust-section .trust-content,
        #trust-section .trust-heading-word,
        #trust-section .trust-description,
        #trust-section .trust-progress-item,
        #trust-section .trust-check-item,
        #trust-section .trust-progress-fill,
        #trust-section .trust-progress-dot {
            opacity: 1 !important;
            transform: none !important;
            filter: none !important;
            transition: none !important;
            animation: none !important;
        }

        #trust-section .trust-progress-fill {
            width: var(--progress, 0%) !important;
        }

    }
</style>


<section
    id="trust-section"
    class="mx-0 bg-sand px-5 py-8 sm:px-6 md:mx-12 md:py-10 lg:mx-[120px] lg:px-8 lg:py-12"
>

    <div class="mx-auto max-w-7xl">


        {{-- =====================================================
             TOP LABEL
        ====================================================== --}}

        <div class="mb-8 lg:mb-10">

            <x-section-label label="Why Global Brands Trust Us" class="trust-anim" data-trust-label />

        </div>


        {{-- =====================================================
             MAIN GRID
        ====================================================== --}}

        <div
            class="grid gap-8 lg:grid-cols-[.62fr_1.38fr] lg:gap-7"
        >


            {{-- =================================================
                 LEFT COLUMN — MAIN IMAGE (slides LEFT ➜ RIGHT)
            ================================================== --}}

            <div
                class="trust-anim trust-image-main relative mt-[2px] h-[380px] overflow-hidden rounded-[22px] shadow-[0_30px_60px_-30px_rgba(7,26,46,.30)] lg:h-[460px]"
                data-trust-main-image
            >

                <div
                    class="trust-image-wrapper relative h-full w-full"
                >

                    <img
                        src="{{ asset('images/process/choose-1.jpg') }}"
                        alt="Textile craftsmanship and yarn production"
                        class="h-full w-full object-cover"
                        loading="lazy"
                    >

                    {{-- subtle overlay --}}
                    <div
                        class="pointer-events-none absolute inset-0 bg-gradient-to-t from-ink/10 via-transparent to-transparent"
                    ></div>

                </div>


                {{-- Top text --}}
                <div class="absolute left-8 top-8 z-10 max-w-[280px] lg:left-10 lg:top-10">

                    <p
                        class="text-2xl font-semibold leading-[1.45] text-ink"
                    >
                        100M+ Satisfied Customers
                        <br>
                        Worldwide
                    </p>

                </div>


                {{-- Floating yellow dot --}}
                <span
                    class="trust-dot absolute right-8 top-24 h-10 w-10 rounded-full bg-brass/80 shadow-[0_0_0_6px_rgba(212,166,42,.25)]"
                ></span>


                {{-- Bottom stats — glass card --}}
                <div
                    class="trust-stat-card absolute bottom-6 right-6 z-10 rounded-2xl px-5 py-4 lg:bottom-8 lg:right-10"
                >

                    <p
                        class="text-4xl font-bold tracking-tight text-ink sm:text-2xl"
                    >
                        350k+
                    </p>

                    <p
                        class="mt-1 text-base text-muted"
                    >
                        Projects Completed
                    </p>

                </div>

            </div>


            {{-- =================================================
                 RIGHT COLUMN
            ================================================== --}}

            <div class="lg:pl-0">


                {{-- =============================================
                     HEADING
                ============================================== --}}

                <div
                    class="trust-anim trust-content"
                    data-trust-content
                >

                    <h2
                        class="trust-heading max-w-5xl text-2xl font-bold leading-[1.08] tracking-tight text-ink"
                    >

                        <span class="trust-heading-line">

                            <span class="trust-heading-word">
                                Why Trust Global Fashion Brands
                            </span>

                        </span>

                        <span class="trust-heading-line">

                            <span class="trust-heading-word">
                                Rely On Our Texora Excellence
                            </span>

                        </span>

                    </h2>


                    {{-- Description --}}
                    <p
                        class="trust-description mt-7 max-w-5xl text-base leading-8 text-muted lg:text-lg"
                    >

                        We are committed to integrating sustainability,
                        environmental stewardship, and ethical governance
                        into our business. As a leader in technical Texoras,
                        we recognize the responsibility we have in reducing
                        our environmental impact, fostering a positive
                        social footprint.

                    </p>

                </div>


                {{-- =============================================
                     IMAGE + PROGRESS
                ============================================== --}}

                <div
                    class="mt-8 max-w-2xl"
                >


                    {{-- SECOND IMAGE — slides LEFT ➜ RIGHT (delayed) --}}
                    <!-- <div
                        class="trust-anim trust-image-second h-[300px] overflow-hidden rounded-[22px] shadow-[0_30px_60px_-30px_rgba(7,26,46,.30)]"
                        data-trust-second-image
                    >

                        <div class="trust-image-wrapper h-full w-full">

                            <img
                                src="{{ asset('images/about/about-1.jpg') }}"
                                alt="Nivritti textile professional"
                                class="h-full w-full object-cover"
                                loading="lazy"
                            >

                        </div>

                    </div> -->


                    {{-- PROGRESS BARS --}}
                    <div class="space-y-9">


                        {{-- Experienced --}}
                        <div
                            class="trust-progress-item"
                            data-progress="85"
                            style="--progress: 85%"
                        >

                            <div
                                class="mb-3 flex items-center justify-between gap-5"
                            >

                                <span
                                    class="text-base font-medium text-ink lg:text-lg"
                                >
                                    Experienced Professionals
                                </span>

                                <span
                                    class="text-base font-medium text-ink lg:text-lg"
                                >
                                    85%
                                </span>

                            </div>


                            <div class="trust-progress-track">

                                <div class="trust-progress-fill"></div>

                                <span class="trust-progress-dot"></span>

                            </div>

                        </div>


                        {{-- Quality --}}
                        <div
                            class="trust-progress-item"
                            data-progress="90"
                            style="--progress: 90%"
                        >

                            <div
                                class="mb-3 flex items-center justify-between gap-5"
                            >

                                <span
                                    class="text-base font-medium text-ink lg:text-lg"
                                >
                                    Quality Materials Only
                                </span>

                                <span
                                    class="text-base font-medium text-ink lg:text-lg"
                                >
                                    90%
                                </span>

                            </div>


                            <div class="trust-progress-track">

                                <div class="trust-progress-fill"></div>

                                <span class="trust-progress-dot"></span>

                            </div>

                        </div>


                        {{-- Eco --}}
                        <div
                            class="trust-progress-item"
                            data-progress="70"
                            style="--progress: 70%"
                        >

                            <div
                                class="mb-3 flex items-center justify-between gap-5"
                            >

                                <span
                                    class="text-base font-medium text-ink lg:text-lg"
                                >
                                    Eco-Friendly Solutions
                                </span>

                                <span
                                    class="text-base font-medium text-ink lg:text-lg"
                                >
                                    70%
                                </span>

                            </div>


                            <div class="trust-progress-track">

                                <div class="trust-progress-fill"></div>

                                <span class="trust-progress-dot"></span>

                            </div>

                        </div>


                    </div>

                </div>


                {{-- =============================================
                     CHECKLIST
                ============================================== --}}


            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    SCROLL REVEAL — IntersectionObserver (no GSAP)
========================================================= --}}

<script>
(function () {

    "use strict";

    var section = document.getElementById("trust-section");

    if (!section) return;


    /* =====================================================
       ELEMENTS TO REVEAL
    ====================================================== */

    var targets = [].concat(

        Array.prototype.slice.call(
            section.querySelectorAll(
                "[data-trust-label], [data-trust-main-image], [data-trust-content], [data-trust-second-image]"
            )
        ),

        Array.prototype.slice.call(
            section.querySelectorAll(
                ".trust-heading-word, .trust-description, .trust-progress-item, .trust-check-item"
            )
        )

    ).filter(Boolean);


    /* =====================================================
       REDUCED MOTION — show everything immediately
    ====================================================== */

    if (
        window.matchMedia("(prefers-reduced-motion: reduce)").matches
    ) {
        section.classList.add("trust-force-visible");
        return;
    }


    /* =====================================================
       NO IntersectionObserver — fallback
    ====================================================== */

    if (!("IntersectionObserver" in window)) {
        section.classList.add("trust-force-visible");
        return;
    }


    var observer = new IntersectionObserver(
        function (entries) {

            entries.forEach(function (entry) {

                if (entry.isIntersecting) {
                    entry.target.classList.add("is-visible");
                    observer.unobserve(entry.target);
                }

            });

        },
        {
            threshold: 0.18,
            rootMargin: "0px 0px -8% 0px"
        }
    );

    targets.forEach(function (el) {
        observer.observe(el);
    });


    /* =====================================================
       SAFETY NET — never leave the section invisible
    ====================================================== */

    window.setTimeout(function () {
        section.classList.add("trust-force-visible");
    }, 4000);

})();
</script>
