import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

const isReducedMotion = () => window.matchMedia('(prefers-reduced-motion: reduce)').matches;

const initCollection = (section) => {
    const label = section.querySelector('[data-collection-label]');
    const heading = section.querySelector('[data-collection-heading]');
    const text = section.querySelector('[data-collection-text]');
    const grid = section.querySelector('[data-collection-grid]');
    const cards = gsap.utils.toArray('[data-product-card]', section);
    const copy = [label, heading, text].filter(Boolean);

    if (!grid || !cards.length) return;

    if (isReducedMotion()) {
        gsap.set([...copy, ...cards], { clearProps: 'all' });
        return;
    }

    const compact = window.matchMedia('(max-width: 639px)').matches;
    const slide = compact ? 18 : 32;

    // Collection header ------------------------------------------------------
    if (copy.length) {
        gsap.set(copy, { opacity: 0, y: 24 });

        gsap.to(copy, {
            opacity: 1,
            y: 0,
            duration: 0.72,
            ease: 'power3.out',
            stagger: 0.09,
            scrollTrigger: {
                trigger: section,
                start: 'top 78%',
                once: true,
            },
        });
    }

    // Product cards ----------------------------------------------------------
    // Odd cards travel right-to-left as well as bottom-to-top; even cards rise
    // only. A 0.12s stagger gives the grid a soft cascading entrance.
    gsap.set(cards, {
        opacity: 0,
        y: compact ? 28 : 38,
        x: (index) => (index % 2 === 0 ? slide : 0),
    });

    gsap.to(cards, {
        opacity: 1,
        x: 0,
        y: 0,
        duration: compact ? 0.72 : 0.84,
        ease: 'power3.out',
        stagger: 0.09,
        scrollTrigger: {
            trigger: grid,
            start: 'top 82%',
            toggleActions: 'play none none reverse',
        },
    });
};

const init = () => {
    try {
        document.querySelectorAll('[data-collection-section]').forEach(initCollection);
    } catch (error) {
        document.documentElement.classList.add('anim-failed');
    }
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
} else {
    init();
}
