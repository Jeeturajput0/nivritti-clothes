<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#FFFDF5">
    <title>@yield('title', 'Nivritti | Thoughtful textiles')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html { scroll-behavior: smooth; }
        html, body { background: var(--ivory); color: var(--text); }
        main { background-color: var(--ivory); }
        select, option { background-color: var(--color-ivory); color: var(--color-ink); }
        .serif { font-family: var(--font-serif); }
        .js .reveal { opacity: 0; }
        .js.anim-failed .reveal { opacity: 1 !important; }
        .site-loader { display: none; }
        .js .site-loader { display: grid; }
        .site-loader[hidden] { display: none !important; }
        .site-loader { animation: loader-failsafe 1.8s steps(1, end) forwards; }
        @keyframes loader-failsafe {
            0%, 72% { visibility: visible; }
            73%, 100% { visibility: hidden; }
        }
        .site-loader-mark { animation: loader-mark-in .55s cubic-bezier(.2,.7,.2,1) both; }
        @keyframes loader-mark-in {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .scroll-progress { transform: scaleX(0); transform-origin: left center; }
        .stitch-divider {
            position: absolute;
            top: 0;
            left: max(1.25rem, calc((100% - 80rem) / 2));
            width: min(7rem, 22vw);
            height: 1px;
            background: repeating-linear-gradient(90deg, var(--color-brass) 0 3px, transparent 3px 7px);
            opacity: .58;
            transform-origin: left center;
        }
        .needle-thread { pointer-events: none; }
        .needle-thread path { vector-effect: non-scaling-stroke; }
        @view-transition { navigation: auto; }
        ::view-transition-old(root) { animation: page-out .2s ease both; }
        ::view-transition-new(root) { animation: page-in .38s cubic-bezier(.2,.7,.2,1) both; }
        @keyframes page-out { to { opacity: 0; } }
        @keyframes page-in { from { opacity: .86; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }
        .anim-word-mask { display: inline-block; overflow: hidden; vertical-align: bottom; margin-bottom: -.12em; padding-bottom: .12em; }
        .anim-word { display: inline-block; will-change: transform, opacity, filter; }
        .image-zoom img { transition: transform .8s cubic-bezier(.2,.7,.2,1); }
        .image-zoom:hover img { transform: scale(1.045); }
        .catalog-card { transition: transform .35s cubic-bezier(.2,.7,.2,1), border-color .35s ease; }
        .catalog-card:hover { transform: translateY(-6px); border-color: var(--color-brass); }
        .anim-cta { transition: transform .3s cubic-bezier(.2,.7,.2,1), background-color .3s ease, color .3s ease, border-color .3s ease; }
        .anim-cta:hover { transform: translateY(-2px) scale(1.01); }
        .anim-cta .anim-cta-arrow { display: inline-block; transition: transform .3s cubic-bezier(.2,.7,.2,1); }
        .anim-cta:hover .anim-cta-arrow { transform: translate(3px, -3px); }
        .footer-cta .anim-cta-arrow { display: inline-block; transition: transform .3s cubic-bezier(.2,.7,.2,1); }
        .footer-cta:hover .anim-cta-arrow { transform: translate(3px, -3px); }
        .review-slide { grid-area: 1 / 1; }
        .review-slide + .review-slide { visibility: hidden; opacity: 0; }
        .review-dot { width: 8px; height: 8px; border-radius: 9999px; background: rgba(16,40,64,.25); transition: background-color .3s ease, transform .3s ease; }
        .review-dot:hover { background: rgba(16,40,64,.5); }
        .review-dot.is-active { background: var(--color-brass); transform: scale(1.15); }
        .review-dot:focus-visible { outline: 2px solid var(--color-brass); outline-offset: 4px; }
        .service-card { transition: transform .5s cubic-bezier(.2,.7,.2,1), box-shadow .5s cubic-bezier(.2,.7,.2,1), border-color .4s ease; }
        .service-icon { transition: transform .45s cubic-bezier(.2,.7,.2,1); }
        @media (hover: hover) {
            .service-card:hover { transform: translateY(-6px); border-color: var(--color-brass); box-shadow: 0 22px 44px -30px rgba(7,26,46,.20); }
            .service-card:hover .service-icon { transform: scale(1.04) rotate(2deg); }
            .services-cta:hover { transform: translateY(-2px); background-color: var(--color-brass-deep); box-shadow: 0 14px 28px -20px rgba(7,26,46,.26); }
            .services-cta:hover .services-cta-arrow { transform: translateX(3px); }
        }
        @media (hover: none) {
            .service-card:active { transform: translateY(-2px); border-color: var(--color-brass); box-shadow: 0 18px 36px -26px rgba(7,26,46,.20); }
            .service-card:active .service-icon { transform: scale(1.03); }
        }
        .services-cta { transition: transform .4s cubic-bezier(.2,.7,.2,1), background-color .3s ease, box-shadow .4s ease; }
        .services-cta .services-cta-arrow { display: inline-block; transition: transform .4s cubic-bezier(.2,.7,.2,1); }
        .services-cta:focus-visible { outline: 2px solid var(--color-brass); outline-offset: 3px; }
        .js.anim-failed .service-card { opacity: 1 !important; transform: none !important; filter: none !important; }
        .js.anim-failed .services-section [data-services-label],
        .js.anim-failed .services-section [data-services-dot],
        .js.anim-failed .services-section .services-cta,
        .js.anim-failed .services-section .anim-word { opacity: 1 !important; transform: none !important; filter: none !important; }

        /* Collection / product cards */
        .product-card { transition: transform .45s cubic-bezier(.2,.7,.2,1); }
        .product-media { transition: box-shadow .45s cubic-bezier(.2,.7,.2,1); }
        .product-img { transition: opacity .6s ease, transform .7s cubic-bezier(.2,.7,.2,1); }
        .product-img--alt { opacity: 0; transform: scale(1.05); }
        .product-overlay { background-color: var(--color-ink); opacity: 0; transition: opacity .5s ease; }
        .product-title { transition: transform .4s cubic-bezier(.2,.7,.2,1); }
        .product-category { transition: opacity .4s ease; }
        .product-cta-badge { transition: transform .4s cubic-bezier(.2,.7,.2,1), background-color .4s ease; }
        .product-cta-arrow { transition: transform .4s cubic-bezier(.2,.7,.2,1); }
        .product-card:focus-visible { outline: 2px solid var(--color-brass); outline-offset: 4px; }
        .product-card:focus-visible .product-img--main { opacity: 0; }
        .product-card:focus-visible .product-img--alt { opacity: 1; transform: scale(1); }
        @media (hover: hover) {
            .product-card:hover { transform: translateY(-6px); border-color: var(--color-brass); }
            .product-card:hover .product-media { box-shadow: 0 30px 55px -34px rgba(7,26,46,.32); }
            .product-card:hover .product-img--main { opacity: 0; transform: scale(1.04); }
            .product-card:hover .product-img--alt { opacity: 1; transform: scale(1); }
            .product-card:hover .product-overlay { opacity: .08; }
            .product-card:hover .product-title { transform: translateY(-3px); }
            .product-card:hover .product-category { opacity: 1; }
            .product-card:hover .product-cta-badge { transform: translateY(-2px); background-color: var(--color-brass-soft); }
            .product-card:hover .product-cta-arrow { transform: translateX(5px); }
        }
        @media (hover: none) {
            .product-card:active { transform: translateY(-4px); }
            .product-card:active .product-img--main { opacity: 0; transform: scale(1.04); }
            .product-card:active .product-img--alt { opacity: 1; transform: scale(1); }
            .product-card:active .product-overlay { opacity: .08; }
        }
        .js.anim-failed [data-collection-section] [data-collection-label],
        .js.anim-failed [data-collection-section] [data-collection-heading],
        .js.anim-failed [data-collection-section] [data-collection-text],
        .js.anim-failed [data-collection-section] [data-product-card] { opacity: 1 !important; transform: none !important; }
        .js.anim-failed [data-gallery-card],
        .js.anim-failed [data-gallery-header-item] { opacity: 1 !important; transform: none !important; }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { scroll-behavior: auto !important; animation-duration: .01ms !important; transition-duration: .01ms !important; }
            .site-loader { display: none !important; }
            .scroll-progress { display: none; }
            .decor-botanical, .decor-circles { animation: none !important; }
            ::view-transition-old(root), ::view-transition-new(root) { animation: none !important; }
            .js .reveal, .anim-word, .gallery-card { opacity: 1 !important; transform: none !important; filter: none !important; clip-path: none !important; }
            .image-zoom:hover img, .catalog-card:hover, .anim-cta:hover, .anim-cta:hover .anim-cta-arrow,
            .service-card:hover, .service-card:hover .service-icon, .services-cta:hover, .services-cta:hover .services-cta-arrow,
            .product-card:hover, .product-card:hover .product-img--main, .product-card:hover .product-img--alt,
            .product-card:hover .product-title, .product-card:hover .product-cta-badge, .product-card:hover .product-cta-arrow { transform: none !important; }
        }
    </style>
    <script>
        document.documentElement.classList.add('js');
        window.setTimeout(function () {
            if (!window.__nivrittiAnimationsReady) document.documentElement.classList.add('anim-failed');
        }, 4000);
    </script>
</head>
<body class="min-h-screen overflow-x-hidden antialiased">
    <div class="site-loader fixed inset-0 z-[100] place-items-center bg-ink text-ivory" aria-hidden="true">
        <div class="site-loader-mark flex flex-col items-center gap-4">
            <svg class="h-12 w-12 text-brass" viewBox="0 0 48 48" fill="none" aria-hidden="true">
                <path d="M7 35C15 35 15 13 24 13s9 22 17 22" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" />
                <path d="m23 11 8-7-2 11-6-4Z" fill="currentColor" />
            </svg>
            <span class="text-[11px] font-medium tracking-[.34em]">NIVRITTI</span>
        </div>
    </div>
    <div class="scroll-progress fixed inset-x-0 top-0 z-[70] h-[2px] bg-brass" data-scroll-progress aria-hidden="true"></div>
    @include('components.navbar')
    <main>@yield('content')</main>
    @include('components.footer')
</body>
</html>
