<section class="relative overflow-hidden bg-[#ffe28c70] px-5 py-8 sm:px-6 lg:px-8 lg:py-10" aria-labelledby="newsletter-title">
    <x-decorative-botanical variant="lotus" class="decor-lotus absolute -left-6 top-0 hidden h-64 w-48 text-brass-deep/70 opacity-40 sm:block" />
    <x-decorative-circles class="decor-circles absolute -right-20 top-0 hidden h-72 w-72 text-brass-deep/80 opacity-45 lg:block" />
    <div class="reveal relative z-10 mx-auto flex max-w-7xl flex-col items-center justify-between gap-6 rounded-[2rem] border border-ink/10 bg-[#FFFEF9] px-6 py-7 shadow-[0_18px_45px_-35px_rgba(7,26,46,.28)] sm:px-9 lg:flex-row lg:px-12">
        <div class="flex items-center gap-4">
            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-brass/15 text-brass-deep" aria-hidden="true">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 21c-4-3-7-6.4-7-10a7 7 0 0 1 14 0c0 3.6-3 7-7 10Z" />
                    <path d="M12 20c0-5 1-8 4-11M12 16l-3-3" />
                </svg>
            </span>
            <div>
                <h2 id="newsletter-title" class="serif text-2xl text-ink">Let's make something beautiful.</h2>
                <p class="mt-1 text-sm leading-6 text-muted">Get updates on new collections, stories and more.</p>
            </div>
        </div>
        <div class="flex w-full max-w-xl items-center gap-2 rounded-full border border-ink/15 bg-ivory p-1.5 lg:w-auto" role="group" aria-label="Newsletter signup preview">
            <label for="newsletter-email" class="sr-only">Email address</label>
            <input id="newsletter-email" type="email" placeholder="Your email address" class="min-w-0 flex-1 bg-transparent px-4 py-2 text-sm text-ink outline-none placeholder:text-muted" autocomplete="email">
            <button type="button" disabled aria-describedby="newsletter-note" class="shrink-0 cursor-not-allowed rounded-full bg-brass/60 px-5 py-3 text-xs font-semibold text-ink/70">Subscribe</button>
        </div>
        <p id="newsletter-note" class="sr-only">Newsletter signup is not available yet.</p>
    </div>
</section>
