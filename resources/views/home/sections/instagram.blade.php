<section class="bg-ivory px-5 py-10 sm:px-6 lg:px-8 lg:py-12" aria-labelledby="instagram-title">
    <div class="mx-auto max-w-7xl">
        <div class="reveal mb-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <x-section-label label="From the studio" />
                <h2 id="instagram-title" class="serif mt-4 text-2xl leading-tight text-ink">A closer look at Nivritti.</h2>
                <p class="mt-2 max-w-xl text-sm leading-7 text-muted">Explore the textures, details and moments that inspire our collections.</p>
            </div>
            <a href="/gallery" class="inline-flex items-center gap-2 self-start border-b border-brass pb-1 text-xs font-semibold uppercase tracking-[.14em] text-ink transition hover:text-brass-deep sm:self-auto">Explore the gallery <x-icon name="arrow-up-right" class="h-3.5 w-3.5" /></a>
        </div>
        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-6 lg:gap-4">
            @foreach(range(1, 6) as $instagramImage)
            <a href="/gallery" class="instagram-tile image-zoom reveal aspect-square bg-sand" aria-label="Explore the Nivritti gallery">
                <img src="{{ asset('images/instagram/instagram-' . $instagramImage . '.jpg') }}" alt="Nivritti textile and fashion detail {{ $instagramImage }}" class="h-full w-full object-cover" loading="lazy">
            </a>
            @endforeach
        </div>
    </div>
</section>
