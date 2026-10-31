<section id="collection" data-collection-section class="relative overflow-hidden bg-ivory py-8 md:py-10 lg:py-12" aria-labelledby="collection-title">
    <span data-stitch-divider class="stitch-divider" aria-hidden="true"></span>
    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <x-section-label label="New arrivals" data-collection-label />
            <h2 id="collection-title" data-collection-heading class="serif mt-4 text-2xl text-ink">Latest Collections</h2>
            <p data-collection-text class="mt-5 max-w-2xl text-base leading-8 text-muted lg:text-lg">Discover thoughtfully crafted pieces designed with prints, comfort and modern trends in mind.</p>
        </div>

        <div data-collection-grid class="mt-10 grid gap-x-4 gap-y-7 sm:grid-cols-2 lg:mt-12 lg:grid-cols-4 lg:gap-x-5 lg:gap-y-8">
            @foreach(array_slice($products, 0, 4) as $product)
            <article data-product-card class="h-full">
                <a href="/catalog" class="product-card group flex h-full flex-col">
                    <div class="product-media relative aspect-[3/4] shrink-0 overflow-hidden bg-sand">
                        <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="product-img product-img--main absolute inset-0 h-full w-full object-cover" loading="lazy">
                        <img src="{{ asset($product['hover']) }}" alt="" class="product-img product-img--alt absolute inset-0 h-full w-full object-cover" loading="lazy" aria-hidden="true">
                        <span class="product-overlay pointer-events-none absolute inset-0" aria-hidden="true"></span>
                        <span class="absolute left-2 top-2 bg-wine px-2 py-1 text-[8px] font-semibold uppercase tracking-[.14em] text-ivory">New</span>
                    </div>

                    <div class="mt-3.5 flex flex-1 flex-col">
                        <div class="flex items-center justify-between gap-3">
                            <p class="product-category text-[9px] font-semibold uppercase tracking-[.18em] text-muted opacity-75">{{ $product['category'] }}</p>
                        </div>
                        <h3 class="product-title serif mt-1.5 text-lg leading-snug text-ink">{{ $product['name'] }}</h3>
                        <p class="mt-1.5 text-[13px] leading-6 text-muted">{{ $product['description'] }}</p>

                        <div class="mt-auto pt-3">
                            <div class="flex items-center justify-between gap-3 border-t border-ink/10 pt-3">
                                <span class="text-[10px] font-semibold uppercase tracking-[.12em] text-brass-deep">Explore piece</span>
                                <span class="product-cta-badge flex h-8 w-8 items-center justify-center rounded-full bg-brass text-ink" aria-hidden="true">
                                    <svg class="product-cta-arrow h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="m13 6 6 6-6 6" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
            @endforeach
        </div>
        <div class="mt-7 text-center">
            <a href="/catalog" class="inline-flex items-center gap-2 border-b border-brass px-1 pb-1 text-[9px] font-semibold uppercase tracking-[.18em] text-brass-deep">View all <x-icon name="arrow-up-right" class="h-3.5 w-3.5" /></a>
        </div>
    </div>
</section>
