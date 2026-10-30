@props(['filters' => [], 'total' => 0])

<div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
    <div class="flex flex-wrap items-center gap-2" role="group" aria-label="Filter gallery by category">
        @foreach ($filters as $filter)
            <button
                type="button"
                data-gallery-filter="{{ $filter['key'] }}"
                aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
                class="gallery-filter relative overflow-hidden rounded-full px-4 py-2 text-[10px] font-semibold uppercase tracking-[.18em] transition duration-300 sm:px-5"
            >
                <span class="relative z-10">{{ $filter['label'] }}</span>
                <span class="gallery-filter-underline absolute inset-x-3 bottom-1" aria-hidden="true"></span>
            </button>
        @endforeach
    </div>

    <p class="text-[10px] uppercase tracking-[.28em] text-muted" aria-live="polite" data-gallery-count>
        {{ $total }} {{ $total === 1 ? 'photograph' : 'photographs' }}
    </p>
</div>
