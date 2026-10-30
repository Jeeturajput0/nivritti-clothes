import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

const reducedMotion = () => window.matchMedia('(prefers-reduced-motion: reduce)').matches;

const pad = (value) => String(value).padStart(2, '0');

/**
 * Draw the golden thread under the gallery heading.
 */
const initHeader = () => {
    const line = document.querySelector('[data-gallery-thread]');
    const items = gsap.utils.toArray('[data-gallery-header-item]');

    if (line) {
        if (reducedMotion()) {
            gsap.set(line, { scaleX: 1, transformOrigin: 'left center' });
        } else {
            gsap.set(line, { scaleX: 0, transformOrigin: 'left center' });
            gsap.to(line, { scaleX: 1, duration: 1.6, ease: 'power2.inOut', delay: 0.25 });
        }
    }

    if (reducedMotion() || !items.length) return;

    gsap.from(items, {
        opacity: 0,
        y: 24,
        duration: 0.9,
        stagger: 0.1,
        ease: 'power3.out',
        clearProps: 'transform,opacity',
    });
};

/**
 * Reveal gallery cards as they enter the viewport (one editorial run of
 * images at a time), then leave them alone.
 */
const initReveal = (cards) => {
    if (reducedMotion() || !cards.length) return;

    gsap.set(cards, { opacity: 0, y: 40, scale: 0.96 });

    const reveal = (batch) => {
        gsap.to(batch, {
            opacity: 1,
            y: 0,
            scale: 1,
            duration: 0.85,
            stagger: 0.08,
            ease: 'power3.out',
            overwrite: true,
            onComplete: () => gsap.set(batch, { clearProps: 'transform' }),
        });
    };

    ScrollTrigger.batch(cards, {
        start: 'top 92%',
        once: true,
        onEnter: reveal,
    });
};

const initFilters = (cards) => {
    const buttons = gsap.utils.toArray('[data-gallery-filter]');
    const countLabel = document.querySelector('[data-gallery-count]');

    if (!buttons.length || !cards.length) return;

    buttons.forEach((button) => {
        button.addEventListener('click', () => {
            const filter = button.dataset.galleryFilter;

            buttons.forEach((other) => other.setAttribute('aria-pressed', String(other === button)));

            let shown = 0;

            cards.forEach((card) => {
                const matches = filter === 'all' || card.dataset.category === filter;
                card.hidden = !matches;

                if (!matches) return;

                shown += 1;

                if (reducedMotion()) {
                    gsap.set(card, { opacity: 1 });
                    return;
                }

                gsap.fromTo(
                    card,
                    { opacity: 0, y: 14, scale: 0.98 },
                    {
                        opacity: 1,
                        y: 0,
                        scale: 1,
                        duration: 0.5,
                        ease: 'power2.out',
                        overwrite: true,
                        onComplete: () => gsap.set(card, { clearProps: 'transform' }),
                    }
                );
            });

            if (countLabel) {
                countLabel.textContent = `${shown} ${shown === 1 ? 'photograph' : 'photographs'}`;
            }

            ScrollTrigger.refresh();
        });
    });
};

const initLightbox = (cards) => {
    const lightbox = document.querySelector('[data-gallery-lightbox]');
    if (!lightbox || !cards.length) return;

    const panel = lightbox.querySelector('[data-gallery-lightbox-panel]');
    const backdrop = lightbox.querySelector('[data-gallery-lightbox-backdrop]');
    const image = lightbox.querySelector('[data-gallery-lightbox-image]');
    const title = lightbox.querySelector('[data-gallery-lightbox-title]');
    const category = lightbox.querySelector('[data-gallery-lightbox-category]');
    const counter = lightbox.querySelector('[data-gallery-lightbox-counter]');
    const closeButton = lightbox.querySelector('[data-gallery-lightbox-close]');
    const prevButton = lightbox.querySelector('[data-gallery-lightbox-prev]');
    const nextButton = lightbox.querySelector('[data-gallery-lightbox-next]');

    const visible = () => cards.filter((card) => !card.hidden);

    let current = 0;
    let isOpen = false;
    let lastFocused = null;

    const render = (index) => {
        const list = visible();
        if (!list.length) return;

        current = (index + list.length) % list.length;
        const card = list[current];

        image.src = card.dataset.src;
        image.alt = card.dataset.title;
        title.textContent = card.dataset.title;
        category.textContent = card.dataset.category;
        counter.textContent = `${pad(current + 1)} / ${pad(list.length)}`;

        if (!reducedMotion()) {
            gsap.fromTo(
                image,
                { opacity: 0.35, scale: 0.985 },
                { opacity: 1, scale: 1, duration: 0.45, ease: 'power2.out', overwrite: true, clearProps: 'transform' }
            );
        }
    };

    const open = (card) => {
        const list = visible();
        const index = list.indexOf(card);

        if (index === -1) return;

        lastFocused = card;
        render(index);

        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        document.body.style.overflow = 'hidden';
        isOpen = true;

        if (!reducedMotion()) {
            gsap.fromTo(lightbox, { opacity: 0 }, { opacity: 1, duration: 0.3, ease: 'power2.out' });
            gsap.fromTo(
                panel,
                { opacity: 0, y: 18, scale: 0.96 },
                { opacity: 1, y: 0, scale: 1, duration: 0.55, ease: 'power3.out', clearProps: 'transform' }
            );
        }

        closeButton.focus({ preventScroll: true });
    };

    const close = () => {
        if (!isOpen) return;
        isOpen = false;

        const finish = () => {
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
            gsap.set(lightbox, { clearProps: 'opacity' });
            image.removeAttribute('src');
            document.body.style.overflow = '';
            lastFocused?.focus({ preventScroll: true });
        };

        if (reducedMotion()) {
            finish();
            return;
        }

        gsap.to(panel, { opacity: 0, y: 12, scale: 0.97, duration: 0.25, ease: 'power2.in', clearProps: 'transform' });
        gsap.to(lightbox, { opacity: 0, duration: 0.3, ease: 'power2.in', onComplete: finish });
    };

    const step = (direction) => {
        if (!isOpen) return;
        render(current + direction);
    };

    cards.forEach((card) => {
        card.addEventListener('click', () => open(card));
    });

    closeButton.addEventListener('click', close);
    prevButton.addEventListener('click', () => step(-1));
    nextButton.addEventListener('click', () => step(1));
    backdrop.addEventListener('click', close);

    document.addEventListener('keydown', (event) => {
        if (!isOpen) return;

        if (event.key === 'Escape') {
            event.preventDefault();
            close();
        } else if (event.key === 'ArrowLeft') {
            event.preventDefault();
            step(-1);
        } else if (event.key === 'ArrowRight') {
            event.preventDefault();
            step(1);
        }
    });
};

const init = () => {
    const grid = document.querySelector('[data-gallery-grid]');
    if (!grid) return;

    const cards = gsap.utils.toArray('[data-gallery-card]');
    if (!cards.length) return;

    initHeader();
    initReveal(cards);
    initFilters(cards);
    initLightbox(cards);

    ScrollTrigger.refresh();
    window.addEventListener('load', () => ScrollTrigger.refresh(), { once: true });
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
} else {
    init();
}
