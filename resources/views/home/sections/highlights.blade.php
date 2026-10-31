{{-- Highlights --}}
<section class="relative mx-0 border-t border-b border-ink/10 rounded-t-2xl mt-2 bg-[#ffe28c70] md:mx-12 md:py-8 lg:mx-[120px]">
    <span data-stitch-divider class="stitch-divider" aria-hidden="true"></span>

    <div class="mx-auto grid max-w-7xl grid-cols-2 gap-y-10 px-5 sm:px-6 md:grid-cols-4 lg:px-8">
        @foreach([
        ['25+', 'years of craft'],
        ['18', 'partner workshops'],
        ['12', 'markets reached'],
        ['100%', 'care in every detail']
        ] as $stat)

        <div class="px-4 first:pl-0 md:px-8">
            <p class="serif text-4xl tabular-nums text-ink">
                {{ $stat[0] }}
            </p>

            <p class="mt-2 text-xs uppercase tracking-[.16em] text-muted">
                {{ $stat[1] }}
            </p>
        </div>

        @endforeach
    </div>
</section>
