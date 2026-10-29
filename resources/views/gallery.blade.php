@extends('layouts.app')
@section('title', 'Gallery | Nivritti')
@section('content')
<section class="gallery-replay bg-sand px-5 pb-12 pt-32 sm:px-6 lg:px-8 lg:pb-16">
    <div class="reveal mx-auto max-w-7xl">
        <x-section-label label="A closer look" />
        <h1 class="serif mt-5 text-5xl text-ink sm:text-7xl">The work, in detail.</h1>
        <p class="mt-5 max-w-xl text-sm leading-7 text-muted">Materials, gestures and finished pieces from our world of textiles.</p>
    </div>
</section>

<section class="gallery-replay mx-auto max-w-7xl px-5 py-10 sm:px-6 lg:px-8 lg:py-14">
    <div class="mb-6 flex flex-wrap gap-2" role="group" aria-label="Filter gallery">
        @foreach(['All','Manufacturing','Textile','Products','Process'] as $filter)
            <button type="button" data-filter="{{ strtolower($filter) }}" class="gallery-filter rounded-full border border-ink/20 px-4 py-2 text-xs text-ink transition hover:border-brass hover:bg-brass hover:text-ink {{ $loop->first ? 'border-brass bg-brass text-ink' : '' }}">
                {{ $filter }}
            </button>
        @endforeach
    </div>

    @php
        $galleryItems = [
            ['Textile', 'Cotton, in detail', 'images/fabrics/cotton.jpg', 'row-span-2'],
            ['Manufacturing', 'At the production line', 'images/hero/hero-bg2.jpg', ''],
            ['Products', 'A finished Nivritti look', 'images/products/product-16-a.jpg', ''],
            ['Process', 'Fabric inspection', 'images/hero/hero-bg3.jpg', ''],
            ['Textile', 'Muslin texture', 'images/fabrics/muslin.jpg', 'row-span-2'],
            ['Manufacturing', 'Inside the workshop', 'images/hero/hero-bg.jpg', ''],
            ['Products', 'Festive edit', 'images/collections/festive-edit.jpg', ''],
            ['Process', 'Rayon fabric study', 'images/fabrics/rayon.jpg', ''],
            ['Products', 'Soft silhouette', 'images/products/product-11-a.jpg', ''],
            ['Textile', 'Layered texture study', 'images/categories/muslin-collection.jpg', ''],
            ['Manufacturing', 'Crafted in motion', 'images/process/choose-1.jpg', 'row-span-2'],
            ['Process', 'Detailing at the studio', 'images/process/choose-2.jpg', ''],
            ['Products', 'Everyday elegance', 'images/collections/everyday-elegance.jpg', ''],
            ['Textile', 'Hand-selected fabric', 'images/categories/cotton-collection.jpg', ''],
            ['Manufacturing', 'The making story', 'images/about/about-1.jpg', ''],
            ['Products', 'Premium muslin', 'images/collections/premium-muslin.jpg', 'row-span-2'],
            ['Process', 'Finishing touch', 'images/instagram/instagram-3.jpg', ''],
        ];
    @endphp

    <div class="grid auto-rows-[210px] grid-cols-2 gap-3 sm:auto-rows-[250px] sm:gap-5 lg:grid-cols-3">
        @foreach($galleryItems as $item)
            <button type="button"
                data-category="{{ strtolower($item[0]) }}"
                data-src="{{ asset($item[2]) }}"
                data-title="{{ $item[1] }}"
                class="gallery-item reveal image-zoom group relative {{ $item[3] }} overflow-hidden rounded-[1.25rem] bg-sand text-left shadow-[0_20px_40px_-30px_rgba(27,25,21,0.2)] transition duration-500 hover:-translate-y-1 hover:shadow-[0_28px_45px_-30px_rgba(27,25,21,0.3)]">
                <img src="{{ asset($item[2]) }}" alt="{{ $item[1] }}" class="h-full w-full object-cover" loading="lazy">
                <span class="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-ink/65 via-transparent to-transparent p-4 text-ivory opacity-0 transition duration-300 group-hover:opacity-100">
                    <span class="text-[10px] uppercase tracking-[.2em]">{{ $item[0] }}</span>
                    <span class="serif mt-1 text-xl">{{ $item[1] }}</span>
                </span>
            </button>
        @endforeach
    </div>
</section>

<div id="gallery-lightbox" class="fixed inset-0 z-[70] hidden items-center justify-center bg-ink/90 p-5" role="dialog" aria-modal="true" aria-label="Gallery image">
    <button id="lightbox-close" class="absolute right-5 top-5 h-12 w-12 text-3xl text-ivory" aria-label="Close image">×</button>
    <img id="lightbox-image" src="" alt="" class="max-h-[85vh] max-w-full object-contain">
    <p id="lightbox-title" class="absolute bottom-5 left-0 w-full text-center text-sm text-ivory"></p>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const filters = document.querySelectorAll('.gallery-filter');
        const items = document.querySelectorAll('.gallery-item');
        const box = document.getElementById('gallery-lightbox');
        const image = document.getElementById('lightbox-image');
        const title = document.getElementById('lightbox-title');

        filters.forEach((button) => {
            button.addEventListener('click', () => {
                const filter = button.dataset.filter;
                filters.forEach((b) => b.classList.remove('border-brass', 'bg-brass', 'text-ink'));
                button.classList.add('border-brass', 'bg-brass', 'text-ink');

                items.forEach((item) => {
                    item.classList.toggle('hidden', filter !== 'all' && item.dataset.category !== filter);
                });

                window.__nivrittiRefreshAnimations?.();
            });
        });

        items.forEach((item) => {
            item.addEventListener('click', () => {
                image.src = item.dataset.src;
                image.alt = item.dataset.title;
                title.textContent = item.dataset.title;
                box.classList.remove('hidden');
                box.classList.add('flex');
            });
        });

        const close = () => {
            box.classList.add('hidden');
            box.classList.remove('flex');
            image.src = '';
        };

        document.getElementById('lightbox-close').addEventListener('click', close);
        box.addEventListener('click', (event) => {
            if (event.target === box) close();
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') close();
        });
    });
</script>
@endsection
