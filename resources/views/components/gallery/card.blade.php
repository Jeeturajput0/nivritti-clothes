@props(['item'])

@php
    // Desktop uses a 12-column editorial grid; mobile stays a 2-column masonry.
    $sizes = [
        'portrait' => 'col-span-1 row-span-2 sm:row-span-3 lg:col-span-4 lg:row-span-5',
        'landscape' => 'col-span-2 row-span-2 sm:row-span-3 lg:col-span-8 lg:row-span-5',
        'feature' => 'col-span-1 row-span-2 sm:row-span-3 lg:col-span-6 lg:row-span-5',
    ];

    $size = $sizes[$item['size']] ?? $sizes['portrait'];
@endphp

<button
    type="button"
    data-gallery-card
    data-category="{{ $item['category'] }}"
    data-src="{{ asset($item['image']) }}"
    data-title="{{ $item['title'] }}"
    aria-label="View {{ $item['title'] }} — {{ $item['category'] }}"
    class="gallery-card group relative isolate w-full {{ $size }} overflow-hidden rounded-xl bg-sand text-left shadow-[0_30px_60px_-45px_rgba(27,25,21,.45)] transition-shadow duration-500 hover:shadow-[0_35px_70px_-40px_rgba(27,25,21,.55)] focus-visible:outline-none"
>
    <img
        src="{{ asset($item['image']) }}"
        alt="{{ $item['alt'] }}"
        loading="lazy"
        decoding="async"
        class="absolute inset-0 h-full w-full object-cover object-center transition-[transform,filter] duration-[1200ms] ease-[cubic-bezier(.22,1,.36,1)] group-hover:scale-[1.04] group-hover:brightness-95 group-focus-visible:scale-[1.04]"
    >

    {{-- Cinematic overlay --}}
    <span class="pointer-events-none absolute inset-0 z-10 bg-gradient-to-t from-ink/85 via-ink/25 to-ink/5 opacity-0 transition-opacity duration-500 group-hover:opacity-100 group-focus-visible:opacity-100" aria-hidden="true"></span>

    {{-- Golden thread frame, drawn corner by corner on hover --}}
    <span class="pointer-events-none absolute inset-3 z-20" aria-hidden="true">
        <span class="absolute inset-x-0 top-0 h-px origin-left scale-x-0 bg-thread transition-transform duration-700 ease-out group-hover:scale-x-100 group-focus-visible:scale-x-100"></span>
        <span class="absolute inset-y-0 right-0 w-px origin-top scale-y-0 bg-thread transition-transform delay-150 duration-700 ease-out group-hover:scale-y-100 group-focus-visible:scale-y-100"></span>
        <span class="absolute inset-x-0 bottom-0 h-px origin-right scale-x-0 bg-thread transition-transform delay-300 duration-700 ease-out group-hover:scale-x-100 group-focus-visible:scale-x-100"></span>
        <span class="absolute inset-y-0 left-0 w-px origin-bottom scale-y-0 bg-thread transition-transform delay-500 duration-700 ease-out group-hover:scale-y-100 group-focus-visible:scale-y-100"></span>
    </span>

    {{-- Hover content --}}
    <span class="pointer-events-none absolute inset-0 z-30 flex flex-col justify-between p-4 sm:p-5">
        <span class="flex justify-end">
            <span class="flex h-9 w-9 translate-y-1 items-center justify-center rounded-full border border-thread/50 bg-ink/45 text-thread opacity-0 backdrop-blur-sm transition duration-500 ease-out group-hover:translate-y-0 group-hover:opacity-100 group-focus-visible:translate-y-0 group-focus-visible:opacity-100">
                <x-icon name="arrow-up-right" class="h-4 w-4" />
            </span>
        </span>

        <span class="block translate-y-3 opacity-0 transition duration-500 ease-out group-hover:translate-y-0 group-hover:opacity-100 group-focus-visible:translate-y-0 group-focus-visible:opacity-100">
            <span class="block text-[9px] font-semibold uppercase tracking-[.3em] text-thread">{{ $item['category'] }}</span>
            <span class="serif mt-1.5 block text-lg leading-snug text-ivory sm:text-xl">{{ $item['title'] }}</span>
        </span>
    </span>
</button>
