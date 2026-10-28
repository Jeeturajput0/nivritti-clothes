<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f8f6f2">
    <title>@yield('title', 'Nivritti | Thoughtful textiles')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html { scroll-behavior: smooth; }
        body { background: #F5F7FC; color: #102840; }
        .serif { font-family: Georgia, 'Times New Roman', serif; }
        .js .reveal { opacity: 0; }
        .js.anim-failed .reveal { opacity: 1 !important; }
        .anim-word-mask { display: inline-block; overflow: hidden; vertical-align: bottom; margin-bottom: -.12em; padding-bottom: .12em; }
        .anim-word { display: inline-block; will-change: transform, opacity, filter; }
        .js .gallery-item { clip-path: inset(0 0 100% 0); }
        .js .gallery-item.is-revealed { clip-path: inset(0 0 0% 0); }
        .image-zoom img { transition: transform .8s cubic-bezier(.2,.7,.2,1); }
        .image-zoom:hover img { transform: scale(1.045); }
        .catalog-card { transition: transform .35s cubic-bezier(.2,.7,.2,1); }
        .catalog-card:hover { transform: translateY(-4px); }
        .anim-cta { transition: transform .3s cubic-bezier(.2,.7,.2,1), background-color .3s ease, color .3s ease, border-color .3s ease; }
        .anim-cta:hover { transform: translateY(-2px) scale(1.01); }
        .anim-cta .anim-cta-arrow { display: inline-block; transition: transform .3s cubic-bezier(.2,.7,.2,1); }
        .anim-cta:hover .anim-cta-arrow { transform: translateX(4px); }
        .review-slide { grid-area: 1 / 1; }
        .review-slide + .review-slide { visibility: hidden; opacity: 0; }
        .review-dot { width: 8px; height: 8px; border-radius: 9999px; background: rgba(255,255,255,.28); transition: background-color .3s ease, transform .3s ease; }
        .review-dot:hover { background: rgba(255,255,255,.55); }
        .review-dot.is-active { background: #f5df60; transform: scale(1.15); }
        .review-dot:focus-visible { outline: 2px solid #f5df60; outline-offset: 4px; }
        .service-card { transition: transform .5s cubic-bezier(.2,.7,.2,1), box-shadow .5s cubic-bezier(.2,.7,.2,1), border-color .4s ease; }
        .service-icon { transition: transform .45s cubic-bezier(.2,.7,.2,1); }
        @media (hover: hover) {
            .service-card:hover { transform: translateY(-8px) scale(1.04); border-color: #dbe6f5; box-shadow: 0 30px 60px -30px rgba(11,33,54,.32); }
            .service-card:hover .service-icon { transform: scale(1.08) rotate(3deg); }
            .services-cta:hover { transform: translateY(-4px); background-color: #d9bf35; box-shadow: 0 18px 32px -20px rgba(11,33,54,.45); }
            .services-cta:hover .services-cta-arrow { transform: translateX(5px); }
        }
        @media (hover: none) {
            .service-card:active { transform: translateY(-4px) scale(1.02); border-color: #dbe6f5; box-shadow: 0 22px 44px -26px rgba(11,33,54,.28); }
            .service-card:active .service-icon { transform: scale(1.06) rotate(2deg); }
        }
        .services-cta { transition: transform .4s cubic-bezier(.2,.7,.2,1), background-color .3s ease, box-shadow .4s ease; }
        .services-cta .services-cta-arrow { display: inline-block; transition: transform .4s cubic-bezier(.2,.7,.2,1); }
        .services-cta:focus-visible { outline: 2px solid #0b2136; outline-offset: 3px; }
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
        .product-overlay { background-color: #0b2136; opacity: 0; transition: opacity .5s ease; }
        .product-title { transition: transform .4s cubic-bezier(.2,.7,.2,1); }
        .product-category { transition: opacity .4s ease; }
        .product-cta-badge { transition: transform .4s cubic-bezier(.2,.7,.2,1), background-color .4s ease; }
        .product-cta-arrow { transition: transform .4s cubic-bezier(.2,.7,.2,1); }
        .product-card:focus-visible { outline: 2px solid #102840; outline-offset: 4px; }
        .product-card:focus-visible .product-img--main { opacity: 0; }
        .product-card:focus-visible .product-img--alt { opacity: 1; transform: scale(1); }
        @media (hover: hover) {
            .product-card:hover { transform: translateY(-8px); }
            .product-card:hover .product-media { box-shadow: 0 30px 55px -34px rgba(11,33,54,.42); }
            .product-card:hover .product-img--main { opacity: 0; transform: scale(1.04); }
            .product-card:hover .product-img--alt { opacity: 1; transform: scale(1); }
            .product-card:hover .product-overlay { opacity: .08; }
            .product-card:hover .product-title { transform: translateY(-3px); }
            .product-card:hover .product-category { opacity: 1; }
            .product-card:hover .product-cta-badge { transform: translateY(-2px); background-color: #efd64b; }
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
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { scroll-behavior: auto !important; animation-duration: .01ms !important; transition-duration: .01ms !important; }
            .js .reveal, .anim-word, .gallery-item { opacity: 1 !important; transform: none !important; filter: none !important; clip-path: none !important; }
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
    @include('components.navbar')
    <main>@yield('content')</main>
    @include('components.footer')
</body>
</html>
