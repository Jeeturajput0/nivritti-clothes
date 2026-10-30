<div
    data-gallery-lightbox
    class="hidden fixed inset-0 z-[90] items-center justify-center"
    role="dialog"
    aria-modal="true"
    aria-label="Gallery image viewer"
>
    <div data-gallery-lightbox-backdrop class="absolute inset-0 bg-ink/95 backdrop-blur-md"></div>

    <div data-gallery-lightbox-panel class="relative z-10 flex h-full w-full flex-col px-4 pb-5 pt-5 sm:px-8 sm:pb-8">
        <div class="flex items-center justify-between gap-4 text-ivory">
            <p data-gallery-lightbox-category class="text-[10px] font-semibold uppercase tracking-[.3em] text-thread"></p>

            <button
                type="button"
                data-gallery-lightbox-close
                class="flex h-11 w-11 items-center justify-center rounded-full border border-ivory/20 text-ivory transition duration-300 hover:border-thread hover:text-thread"
                aria-label="Close image viewer"
            >
                <x-icon name="x" class="h-5 w-5" />
            </button>
        </div>

        <div class="relative flex min-h-0 flex-1 items-center justify-center">
            <button
                type="button"
                data-gallery-lightbox-prev
                class="absolute left-0 z-20 flex h-11 w-11 items-center justify-center rounded-full border border-ivory/20 bg-ink/40 text-ivory backdrop-blur-sm transition duration-300 hover:border-thread hover:text-thread sm:left-2 sm:h-12 sm:w-12"
                aria-label="Previous image"
            >
                <x-icon name="chevron-left" class="h-5 w-5" />
            </button>

            <figure class="mx-12 flex max-h-full max-w-full flex-col items-center sm:mx-16">
                <img
                    data-gallery-lightbox-image
                    src=""
                    alt=""
                    class="max-h-[64vh] w-auto max-w-full rounded-lg object-contain shadow-[0_40px_80px_-40px_rgba(0,0,0,.8)] sm:max-h-[70vh]"
                >
                <figcaption class="mt-5 text-center">
                    <p data-gallery-lightbox-title class="serif text-xl leading-snug text-ivory sm:text-2xl"></p>
                </figcaption>
            </figure>

            <button
                type="button"
                data-gallery-lightbox-next
                class="absolute right-0 z-20 flex h-11 w-11 items-center justify-center rounded-full border border-ivory/20 bg-ink/40 text-ivory backdrop-blur-sm transition duration-300 hover:border-thread hover:text-thread sm:right-2 sm:h-12 sm:w-12"
                aria-label="Next image"
            >
                <x-icon name="chevron-right" class="h-5 w-5" />
            </button>
        </div>

        <div class="mt-4 flex items-center justify-center">
            <p data-gallery-lightbox-counter class="text-[11px] tabular-nums tracking-[.35em] text-ivory/60"></p>
        </div>
    </div>
</div>
