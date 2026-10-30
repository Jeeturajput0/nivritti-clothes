{{-- Shop by category --}}
<style>
    .category-track {
        transition: transform .65s cubic-bezier(.2, .7, .2, 1);
        will-change: transform;
    }

    .category-arrow {
        transition: color .25s ease, background-color .25s ease, border-color .25s ease, transform .25s ease;
    }

    .category-arrow:hover {
        transform: translateY(-2px);
    }

    .category-arrow:disabled {
        cursor: not-allowed;
        opacity: .42;
    }

    .category-arrow:disabled:hover {
        transform: none;
    }

    @media (prefers-reduced-motion: reduce) {

        .category-track,
        .category-arrow {
            transition-duration: .01ms;
        }
    }
</style>
@php
$categories = [
['Three Piece Kurti Dupatta Sets', 'images/categories/three-piece-sets.jpg', 'S · M · L · XL · XXL'],
['Frock Kurtis', 'images/categories/frock-kurtis.jpg', 'S · M · L · XL · XXL'],
['Kurtis', 'images/categories/kurtis.jpg', 'S · M · L · XL · XXL'],
['Two Piece Co-ord Sets', 'images/categories/co-ord-sets.jpg', 'S · M · L · XL · XXL'],
['Quality Fabrics', 'images/categories/cotton-collection.jpg', 'Cotton · Muslin · Rayon'],
];
@endphp
<section aria-labelledby="shop-category-title" class="relative bg-ivory py-8 md:py-10 lg:py-12">
    <span data-stitch-divider class="stitch-divider" aria-hidden="true"></span>
    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
        <div class="reveal mb-8 flex w-full items-end justify-between gap-5 lg:mb-10">
            <div>
                <x-section-label label="Shop by category" />
                <h2 id="shop-category-title" class="serif mt-4 text-2xl">Find your kind of everyday.</h2>
            </div>
            <div class="flex shrink-0 items-center gap-2" role="group" aria-label="Category slider controls">
                <button type="button" class="category-arrow flex h-11 w-11 items-center justify-center rounded-full border border-ink/20 text-ink hover:border-brass hover:bg-brass" data-category-prev aria-label="Previous categories">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M19 12H5" />
                        <path d="m12 19-7-7 7-7" />
                    </svg>
                </button>
                <button type="button" class="category-arrow flex h-11 w-11 items-center justify-center rounded-full border border-ink/20 text-ink hover:border-brass hover:bg-brass" data-category-next aria-label="Next categories">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M5 12h14" />
                        <path d="m12 5 7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="category-viewport relative overflow-hidden" data-category-slider>
            <div class="category-track flex w-max" data-category-track>
                @foreach ($categories as $category)
                <div class="w-[250px] shrink-0 pr-4 sm:w-[290px] lg:w-[300px] lg:pr-5" data-category-slide>
                    <a href="/catalog" class="category-card group/card relative block origin-center text-center focus-visible:z-10" aria-label="Shop {{ $category[0] }}">
                        <div class="category-image relative aspect-[4/5] overflow-hidden bg-sand">
                            <img src="{{ asset($category[1]) }}" alt="{{ $category[0] }}" class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover/card:scale-105" loading="lazy">
                        </div>
                        <div class="pt-3 text-ink">
                            <h3 class="serif text-xl leading-snug">{{ $category[0] }}</h3>
                            <p class="mt-1 text-[9px] uppercase tracking-[.14em] text-muted">{{ $category[2] }}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

            <div class="pointer-events-none absolute inset-y-0 left-0 w-10 bg-gradient-to-r from-ivory via-ivory/40 to-transparent sm:w-16" aria-hidden="true"></div>
            <div class="pointer-events-none absolute inset-y-0 right-0 w-10 bg-gradient-to-l from-ivory via-ivory/40 to-transparent sm:w-16" aria-hidden="true"></div>
        </div>


    </div>
</section>
