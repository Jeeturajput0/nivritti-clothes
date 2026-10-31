{{-- Highlights --}}
<section class="relative mx-0 border-t border-b border-ink/10 rounded-t-2xl mt-2 bg-ivory py-7 md:mx-12 md:py-8 lg:mx-[120px]" aria-label="Nivritti at a glance">
    <span data-stitch-divider class="stitch-divider" aria-hidden="true"></span>

    <div class="mx-auto grid max-w-7xl grid-cols-2 gap-y-10 px-5 sm:px-6 md:grid-cols-4 lg:px-8">
        @foreach([
        ['25+', 'Years of Expertise'],
        ['18', 'Rich Craft Varieties'],
        ['12', 'Global Clients'],
        ['100%', 'Quality Assurance']
        ] as $stat)

        <div class="flex items-center gap-3 border-ink/10 px-4 first:pl-0 md:justify-center md:border-r md:px-6 md:last:border-r-0 lg:gap-4">
            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brass/15 text-brass-deep" aria-hidden="true">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    @switch($loop->index)
                    @case(0)
                    <path d="M12 3 14.8 8.7 21 9.6l-4.5 4.4 1.1 6.2L12 17.3l-5.6 2.9 1.1-6.2L3 9.6l6.2-.9L12 3Z" />
                    @break
                    @case(1)
                    <path d="M4 5h16M4 12h16M4 19h16M7 3v18m10-18v18" />
                    @break
                    @case(2)
                    <circle cx="12" cy="12" r="9" />
                    <path d="M3 12h18M12 3a15 15 0 0 1 0 18M12 3a15 15 0 0 0 0 18" />
                    @break
                    @default
                    <path d="m5 12 4 4L19 6" />
                    <circle cx="12" cy="12" r="9" />
                    @endswitch
                </svg>
            </span>
            <div>
                <p class="serif text-3xl tabular-nums text-ink">{{ $stat[0] }}</p>
                <p class="mt-1 text-[9px] uppercase tracking-[.13em] text-muted sm:text-[10px]">{{ $stat[1] }}</p>
            </div>
        </div>

        @endforeach
    </div>
</section>
