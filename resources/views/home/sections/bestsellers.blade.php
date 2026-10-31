<section id="bestsellers" data-collection-section class="relative overflow-hidden bg-ivory py-8 md:py-10 lg:py-12" aria-labelledby="bestsellers-title">
    <span data-stitch-divider class="stitch-divider" aria-hidden="true"></span>
    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <x-section-label label="Most loved" data-collection-label />
            <h2 id="bestsellers-title" data-collection-heading class="serif mt-4 text-2xl text-ink">Our Most Loved Pieces</h2>
            <p data-collection-text class="mt-5 max-w-2xl text-base leading-8 text-muted">Explore handpicked styles that our customers love for their comfort, craftsmanship and unique designs.</p>
        </div>

        <div data-collection-grid class="mt-8 grid gap-x-4 gap-y-7 sm:grid-cols-2 lg:grid-cols-4 lg:gap-5">
            @php($bestsellerNames = ['Mustard Kurta Set', 'White Floral Suit', 'Printed Kurta', 'Teal Party Dress'])
            @foreach(array_slice($products, 4, 4) as $index => $product)
            <article data-product-card class="h-full">
                <a href="/catalog" class="product-card group flex h-full flex-col">
                    <div class="product-media relative aspect-[3/4] shrink-0 overflow-hidden bg-sand">
                        <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="product-img product-img--main absolute inset-0 h-full w-full object-cover" loading="lazy">
                        <img src="{{ asset($product['hover']) }}" alt="" class="product-img product-img--alt absolute inset-0 h-full w-full object-cover" loading="lazy" aria-hidden="true">
                        <span class="product-overlay pointer-events-none absolute inset-0" aria-hidden="true"></span>
                        <span class="absolute left-2 top-2 bg-brass px-2 py-1 text-[8px] font-semibold uppercase tracking-[.14em] text-ink">Bestseller</span>
                    </div>
                    <div class="mt-3.5 flex flex-1 flex-col">
                        <p class="text-[9px] font-semibold uppercase tracking-[.18em] text-muted">{{ $product['category'] }}</p>
                        <h3 class="product-title serif mt-1.5 text-lg leading-snug text-ink">{{ $bestsellerNames[$index] }}</h3>
                        <p class="mt-1.5 text-[13px] leading-6 text-muted">{{ $product['description'] }}</p>
                        <div class="mt-auto flex items-center justify-between border-t border-ink/10 pt-3">
                            <span class="text-[10px] font-semibold uppercase tracking-[.12em] text-brass-deep">Explore piece</span>
                            <span class="product-cta-badge flex h-8 w-8 items-center justify-center rounded-full bg-brass text-ink" aria-hidden="true"><x-icon name="arrow-up-right" class="h-3.5 w-3.5" /></span>
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
