<footer class="relative isolate overflow-hidden bg-[#071A2E] text-ivory">
    <span data-stitch-divider class="stitch-divider" aria-hidden="true"></span>
    <img src="{{ asset('images/footer/footer1.jpg') }}" alt="" class="absolute inset-0 -z-20 h-full w-full object-cover" aria-hidden="true" loading="lazy">
    <div class="absolute inset-0 -z-10 bg-[#071A2E]/90" aria-hidden="true"></div>
    <x-decorative-botanical variant="branch" class="decor-branch absolute -right-8 bottom-0 hidden h-[28rem] w-80 text-brass-light/60 opacity-40 lg:block" />
    <x-decorative-circles class="decor-circles absolute -left-24 bottom-0 hidden h-80 w-80 text-brass-light/70 opacity-40 lg:block" />
    <div class="relative mx-auto max-w-7xl px-5 py-10 sm:px-6 lg:px-8 lg:py-12">
        <div class="relative z-10 grid gap-8 sm:grid-cols-2 lg:grid-cols-[1.4fr_1fr_1fr_1fr] lg:gap-8">
            <div>
                <a href="/" class="inline-flex items-center" aria-label="Nivritti home"><img src="{{ asset('images/logo/logo.png') }}" alt="Nivritti" class="h-11 w-auto object-contain sm:h-12"></a>
                <p class="mt-5 max-w-xs text-sm leading-7 text-text-inverse-soft">Thoughtful textiles, made with care. We bring considered design and enduring craft together in every collection.</p>
            </div>
            <div>
                <h2 class="text-xs font-semibold uppercase tracking-[.2em] text-brass-light">Quick links</h2>
                <div class="mt-5 space-y-3 text-sm text-text-inverse-soft"><a class="block transition hover:text-brass-light" href="/">Home</a><a class="block transition hover:text-brass-light" href="/about">Our story</a><a class="block transition hover:text-brass-light" href="/gallery">Gallery</a><a class="block transition hover:text-brass-light" href="/catalog">Collection</a></div>
            </div>
            <div>
                <h2 class="text-xs font-semibold uppercase tracking-[.2em] text-brass-light">Our Products</h2>
                <div class="mt-5 space-y-3 text-sm text-text-inverse-soft"><a class="block transition hover:text-brass-light" href="/catalog">Clothing</a><a class="block transition hover:text-brass-light" href="/catalog">Textiles</a><a class="block transition hover:text-brass-light" href="/catalog">Accessories</a><a class="block transition hover:text-brass-light" href="/catalog">New arrivals</a></div>
            </div>
            <div>
                <h2 class="text-xs font-semibold uppercase tracking-[.2em] text-brass-light">Get In Touch</h2>
                <div class="mt-5 space-y-3 text-sm text-text-inverse-soft">
                    <p>For thoughtful partnerships<br>and considered enquiries.</p> <a class="block text-ivory transition hover:text-brass-light" href="mailto:hello@nivritti.in">hello@nivritti.in</a><a class="block transition hover:text-brass-light" href="tel:+910000000000">+91 00000 00000</a>
                    <address class="not-italic leading-6">123 Textile Avenue<br>Jaipur, Rajasthan, India</address>
                    <div class="flex flex-wrap gap-x-4 gap-y-2 pt-1">
                        <a class="transition hover:text-brass-light" href="https://example.com/instagram">Instagram</a>
                        <a class="transition hover:text-brass-light" href="https://example.com/facebook">Facebook</a>
                        <a class="transition hover:text-brass-light" href="https://example.com/pinterest">Pinterest</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10 flex flex-col gap-3 border-t border-ivory/20 pt-6 text-xs text-text-inverse-soft sm:flex-row sm:items-center sm:justify-between"><span>© {{ date('Y') }} Nivritti. All rights reserved.</span><span>Made with care, in India.</span></div>
    </div>
</footer>