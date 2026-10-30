{{-- Customer testimonials --}}
@php
$reviews = [
[
'text' => 'Nivritti has consistently delivered excellent textile quality and professional service. Their attention to detail and craftsmanship has made them a trusted manufacturing partner for our business.',
'name' => 'Savannah Nguyen',
'designation' => 'CEO, AB Tech',
'image' => 'images/instagram/instagram-3.jpg',
],
[
'text' => 'We were impressed by the quality, consistency, and timely delivery from the Nivritti team. Their manufacturing expertise and commitment to quality truly stand out.',
'name' => 'Michael Anderson',
'designation' => 'Founder, Urban Threads',
'image' => 'images/instagram/instagram-1.jpg',
],
[
'text' => 'Working with Nivritti has been a great experience. From product development to final production, their team maintains excellent standards and understands modern textile requirements.',
'name' => 'Emily Carter',
'designation' => 'Creative Director, Moda House',
'image' => 'images/instagram/instagram-6.jpg',
],
];
@endphp
<section id="reviews" class="relative mx-0 scroll-mt-24 bg-ink px-5 py-8 sm:px-6 sm:py-10 md:mx-12 lg:mx-[120px] lg:px-8 lg:py-12" aria-labelledby="reviews-title">
    <span data-stitch-divider class="stitch-divider" aria-hidden="true"></span>
    <div class="mx-auto max-w-7xl">
        <div class="reveal mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between lg:mb-10">
            <div>
                <x-section-label label="Customer testimonials" variant="inverse" />
                <h2 id="reviews-title" class="serif mt-4 max-w-2xl text-2xl leading-tight text-ivory">Good work is remembered.</h2>
            </div>
        </div>

        <div class="grid gap-4 lg:grid-cols-[.9fr_1.1fr] lg:gap-6">
            <div class="image-zoom reveal group relative min-h-[300px] overflow-hidden rounded-[1.75rem] bg-sand sm:min-h-[380px] lg:min-h-[440px]">
                <img src="{{ asset('images/testenomeals.jpeg') }}" alt="A Nivritti maker carefully stitching fabric at her machine" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-t from-ink/75 via-ink/5 to-transparent"></div>
                <div class="absolute bottom-6 left-6 right-24 sm:bottom-8 sm:left-8 sm:right-32">
                    <p class="text-[9px] font-semibold uppercase tracking-[.22em] text-brass-light">Thoughtful textiles</p>
                    <p class="serif mt-2 max-w-sm text-2xl leading-snug text-ivory sm:text-3xl">Made with care, built on trust.</p>
                </div>
                <div class="absolute bottom-5 right-5 h-24 w-20 overflow-hidden rounded-xl border-2 border-ivory bg-sand shadow-[0_12px_30px_-12px_rgba(27,25,21,.55)] sm:bottom-7 sm:right-7 sm:h-36 sm:w-28" aria-hidden="true">
                    <img src="{{ asset('images/process/choose-2.jpg') }}" alt="" class="h-full w-full object-cover" loading="lazy">
                    <span class="absolute inset-x-0 bottom-0 bg-ink/65 px-1.5 py-1 text-center text-[7px] font-medium uppercase tracking-[.12em] text-ivory sm:text-[8px]">In the making</span>
                </div>
            </div>

            <div class="review-slider relative flex min-h-[360px] flex-col justify-between overflow-hidden rounded-[1.75rem] border border-ink/10 bg-sand p-6 sm:min-h-[380px] sm:p-9 lg:min-h-[440px] lg:p-12" data-review-slider>
                <div class="pointer-events-none absolute -bottom-20 -right-16 h-56 w-56 rounded-full border border-brass/20" aria-hidden="true"></div>
                <div class="pointer-events-none absolute -bottom-10 -right-6 h-36 w-36 rounded-full border border-brass/20" aria-hidden="true"></div>
                <div class="relative">
                    <p class="text-[9px] font-semibold uppercase tracking-[.2em] text-brass-deep">A note from our partners</p>
                    <div class="review-stage relative mt-7 grid min-h-[210px] sm:mt-10 sm:min-h-[220px]" aria-live="polite">
                        @foreach($reviews as $index => $review)
                        <div class="review-slide col-start-1 row-start-1 {{ $index === 0 ? 'is-active' : '' }}" data-review-slide>
                            <span class="review-quote serif block h-10 text-6xl leading-none text-brass" aria-hidden="true">“</span>
                            <p data-review-text class="review-text mt-3 max-w-2xl break-words text-lg font-medium leading-[1.55] text-ink sm:text-xl lg:text-2xl">{{ $review['text'] }}</p>
                            <div class="mt-6 flex items-center gap-3 border-t border-ink/10 pt-5">
                                <img data-review-avatar src="{{ asset($review['image']) }}" alt="" class="h-12 w-12 shrink-0 rounded-full border-2 border-ivory object-cover shadow-sm" loading="lazy" aria-hidden="true">
                                <div>
                                    <p data-review-name class="text-sm font-semibold text-ink">{{ $review['name'] }}</p>
                                    <p data-review-role class="mt-1 text-xs text-muted">{{ $review['designation'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="relative mt-5 flex items-center justify-between border-t border-ink/10 pt-5">
                    <p class="text-[9px] font-medium uppercase tracking-[.18em] text-muted">Partnership, in their words</p>
                    <div class="flex items-center gap-3" role="group" aria-label="Choose a review">
                        @foreach($reviews as $index => $review)
                        <button type="button" class="review-dot {{ $index === 0 ? 'is-active' : '' }}" data-review-dot data-review-index="{{ $index }}" aria-label="View review {{ $index + 1 }}" @if($index===0) aria-current="true" @endif></button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
