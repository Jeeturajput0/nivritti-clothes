@extends('layouts.app')
@section('title', 'Collection | Nivritti')
@section('content')
<section class="bg-sand px-5 pb-8 pt-28 sm:px-6 lg:px-8 lg:pb-10">
    <div class="reveal mx-auto max-w-7xl"><x-section-label label="The collection" />
        <h1 class="serif mt-5 text-5xl text-ink sm:text-2xl">Explore our collection.</h1>
        <p class="mt-5 max-w-xl text-sm leading-7 text-muted">Pieces shaped by material, movement and the everyday rituals they become part of. Browse clothing, textiles and accessories, then find the details that feel right for your collection.</p>
        <div class="mt-6 flex flex-wrap gap-x-6 gap-y-2 border-t border-ink/10 pt-4 text-[10px] font-semibold uppercase tracking-[.18em] text-muted">
            <span>Clothing</span>
            <span>Textiles</span>
            <span>Accessories</span>
            <span>Made for everyday</span>
        </div>
    </div>
</section>
<section class="bg-ivory mx-auto max-w-7xl px-5 py-8 sm:px-6 lg:px-8 lg:py-10">
    <p class="mb-5 max-w-2xl text-sm leading-7 text-muted">Use the category filters to explore the range, search for a particular piece, or sort the collection by name.</p>
    <div class="flex flex-col gap-5 border-b border-ink/15 pb-5 md:flex-row md:items-center md:justify-between">
        <div class="flex flex-wrap gap-2">@foreach(['All pieces','Clothing','Textiles','Accessories'] as $category)<button type="button" class="catalog-category rounded-full border border-ink/20 px-4 py-2 text-xs text-ink transition hover:border-brass hover:bg-gradient-to-r from-[#D99A16] via-[#E8B52F] to-[#D49A16] hover:text-ink" data-category="{{ strtolower($category === 'All pieces' ? 'all' : $category) }}">{{ $category }}</button>@endforeach</div>
        <div class="flex flex-wrap gap-3"><label class="flex items-center gap-2 rounded-full border border-ink/15 bg-ivory px-3"><span class="sr-only">Search collection</span><svg class="h-4 w-4 text-muted" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                    <circle cx="11" cy="11" r="7"></circle>
                    <path d="m20 20-4-4"></path>
                </svg><input id="catalog-search" class="w-36 bg-transparent py-2 text-xs text-ink outline-none placeholder:text-muted sm:w-48" placeholder="Search collection"></label><label class="sr-only" for="catalog-sort">Sort collection</label><select id="catalog-sort" class="rounded-full border border-ink/15 bg-ivory px-3 py-2 text-xs text-ink">
                <option value="default">Featured</option>
                <option value="az">Name A–Z</option>
                <option value="za">Name Z–A</option>
            </select></div>
    </div>
    <div id="catalog-grid" class="mt-8 grid gap-x-5 gap-y-8 sm:grid-cols-2 lg:grid-cols-3">
        @foreach([['Clothing','The Everyday Tunic','A relaxed silhouette in breathable cotton.','Request a quote','images/products/product-01-a.jpg'],['Textiles','Handwoven Stripe','A tactile weave with a quiet, natural palette.','Request a quote','images/products/product-02-a.jpg'],['Clothing','Indigo Field Shirt','Easy layering, finished with considered details.','Request a quote','images/products/product-03-a.jpg'],['Accessories','Soft Form Scarf','Lightweight texture for all-season layering.','Request a quote','images/products/product-04-a.jpg'],['Textiles','Earth Tone Check','A versatile pattern developed in earthy colour.','Request a quote','images/products/product-05-a.jpg'],['Clothing','The Studio Set','An effortless pairing designed for movement.','Request a quote','images/products/product-06-a.jpg']] as $product)
        <article class="catalog-card reveal rounded-2xl border border-ink/10 bg-ivory p-2.5" data-category="{{ strtolower($product[0]) }}" data-name="{{ strtolower($product[1]) }}"><a href="#" class="image-zoom group relative block aspect-[4/5] overflow-hidden rounded-xl bg-sand"><img src="{{ asset($product[4]) }}" alt="{{ $product[1] }}" class="h-full w-full object-cover" loading="lazy"><span class="absolute bottom-4 right-4 flex h-11 w-11 items-center justify-center rounded-full bg-ivory text-ink transition group-hover:bg-gradient-to-r from-[#D99A16] via-[#E8B52F] to-[#D49A16] group-hover:text-ink" aria-hidden="true"><x-icon name="arrow-up-right" class="h-4 w-4" /></span></a>
            <div class="flex items-start justify-between gap-4 px-2 pt-3.5">
                <div>
                    <p class="text-[10px] uppercase tracking-[.2em] text-brass-deep">{{ $product[0] }}</p>
                    <h2 class="serif mt-1 text-xl text-ink">{{ $product[1] }}</h2>
                    <p class="mt-2 text-xs leading-5 text-muted">{{ $product[2] }}</p>
                </div>
            </div>
            <div class="mx-2 mt-3.5 flex items-center justify-between border-t border-ink/10 pt-3"><span class="text-xs text-ink">{{ $product[3] }}</span><button type="button" class="inline-flex items-center gap-1.5 text-xs text-brass-deep" aria-label="Request information about {{ $product[1] }}">Enquire <x-icon name="arrow-up-right" class="h-3.5 w-3.5" /></button></div>
        </article>
        @endforeach
    </div>
    <p id="catalog-empty" class="hidden py-12 text-center text-sm text-muted">No pieces match your search.</p>
</section>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const cards = [...document.querySelectorAll('.catalog-card')],
            search = document.getElementById('catalog-search'),
            sort = document.getElementById('catalog-sort');
        let active = 'all';
        const update = () => {
            const query = search.value.toLowerCase().trim();
            cards.forEach(card => card.classList.toggle('hidden', !(active === 'all' || card.dataset.category === active) || !card.dataset.name.includes(query)));
            const visible = cards.filter(card => !card.classList.contains('hidden'));
            document.getElementById('catalog-empty').classList.toggle('hidden', visible.length !== 0);
            const grid = document.getElementById('catalog-grid');
            visible.sort((a, b) => sort.value === 'az' ? a.dataset.name.localeCompare(b.dataset.name) : sort.value === 'za' ? b.dataset.name.localeCompare(a.dataset.name) : 0).forEach(card => grid.appendChild(card));
        };
        document.querySelectorAll('.catalog-category').forEach(button => button.addEventListener('click', () => {
            active = button.dataset.category;
            document.querySelectorAll('.catalog-category').forEach(b => b.classList.remove('border-brass', 'bg-gradient-to-r from-[#D99A16] via-[#E8B52F] to-[#D49A16]', 'text-ink'));
            button.classList.add('border-brass', 'bg-gradient-to-r from-[#D99A16] via-[#E8B52F] to-[#D49A16]', 'text-ink');
            update();
        }));
        search.addEventListener('input', update);
        sort.addEventListener('change', update);
    });
</script>
@endsection