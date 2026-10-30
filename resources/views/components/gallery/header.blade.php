@props(['label' => 'Curated moments'])

<section data-gallery-section class="relative isolate overflow-hidden bg-sand px-5 pb-8 pt-28 sm:px-6 lg:px-8 lg:pb-10 lg:pt-32">
    <div class="pointer-events-none absolute -right-28 -top-16 h-80 w-80 rounded-full border border-brass/20" aria-hidden="true"></div>
    <div class="pointer-events-none absolute -left-32 top-44 h-64 w-64 rounded-full border border-ink/10" aria-hidden="true"></div>

    <div class="relative mx-auto max-w-7xl">
        <div data-gallery-header-item>
            <x-section-label :label="$label" />
        </div>

        <div class="mt-6 flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between lg:gap-12">
            <h1 data-gallery-header-item class="serif max-w-3xl text-[2.75rem] uppercase leading-[.95] tracking-tight text-ink sm:text-2xl lg:text-7xl">
                The Nivritti<br class="hidden sm:block">
                <em class="font-normal not-italic text-brass-deep">Edit</em>
            </h1>

            <p data-gallery-header-item class="max-w-sm text-sm leading-7 text-muted lg:pb-2">
                A visual expression of heritage, craftsmanship and contemporary Indian elegance.
            </p>
        </div>

        <div class="mt-9 h-px w-full bg-ink/10">
            <div data-gallery-thread class="h-px w-full bg-thread"></div>
        </div>
    </div>
</section>
