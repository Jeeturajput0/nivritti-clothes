import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

const isReducedMotion = () => window.matchMedia('(prefers-reduced-motion: reduce)').matches;

/**
 * Split a heading into masked words, keeping <br> and inline markup intact.
 */
const splitWords = (heading) => {
    if (!heading || heading.dataset.animSplit === 'true') {
        return gsap.utils.toArray('.anim-word', heading);
    }

    heading.dataset.animSplit = 'true';

    const walker = document.createTreeWalker(heading, NodeFilter.SHOW_TEXT);
    const textNodes = [];
    while (walker.nextNode()) textNodes.push(walker.currentNode);

    textNodes.forEach((node) => {
        if (!node.nodeValue.trim()) return;

        const fragment = document.createDocumentFragment();

        node.nodeValue.split(/(\s+)/).forEach((part) => {
            if (!part) return;

            if (/^\s+$/.test(part)) {
                fragment.appendChild(document.createTextNode(' '));
                return;
            }

            const mask = document.createElement('span');
            mask.className = 'anim-word-mask';

            const word = document.createElement('span');
            word.className = 'anim-word';
            word.textContent = part;

            mask.appendChild(word);
            fragment.appendChild(mask);
        });

        node.parentNode.replaceChild(fragment, node);
    });

    return gsap.utils.toArray('.anim-word', heading);
};

const initServices = () => {
    const section = document.querySelector('.services-section');
    if (!section) return;

    const label = section.querySelector('[data-services-label]');
    const heading = section.querySelector('[data-services-heading]');
    const dot = section.querySelector('[data-services-dot]');
    const cards = gsap.utils.toArray('[data-service-card]', section);
    const cta = section.querySelector('[data-services-cta]') || section.querySelector('.services-cta');

    if (!heading || !cards.length) return;

    if (isReducedMotion()) {
        gsap.set([label, dot, cta].filter(Boolean), { clearProps: 'all' });
        gsap.set(cards, { clearProps: 'all' });
        return;
    }

    const words = splitWords(heading);
    const compact = window.matchMedia('(max-width: 639px)').matches;

    gsap.set(label, { opacity: 0, y: 12 });
    gsap.set(words, { y: 42, opacity: 0, filter: 'blur(4px)' });
    if (dot) gsap.set(dot, { opacity: 0, scale: 0.9 });
    gsap.set(cards, {
        opacity: 0,
        x: compact ? 18 : 28,
        y: 12,
        scale: 0.99,
    });
    gsap.set(cta, { opacity: 0, y: 14 });

    const cardsPosition = 0.55;
    const ctaPosition = cardsPosition + cards.length * 0.15 + 0.1;

    const timeline = gsap.timeline({
        defaults: { ease: 'power3.out' },
        scrollTrigger: {
            trigger: section,
            start: 'top 75%',
            once: true,
        },
    });

    timeline.to(label, { opacity: 1, y: 0, duration: 0.45 }, 0);

    timeline.to(
        words,
        {
            y: 0,
            opacity: 1,
            filter: 'blur(0px)',
            duration: 0.72,
            stagger: 0.045,
            ease: 'power4.out',
            onComplete: () => gsap.set(words, { clearProps: 'filter' }),
        },
        0.12
    );

    if (dot) timeline.to(dot, { opacity: 1, scale: 1, duration: 0.5, ease: 'power3.out' }, 0.5);

    timeline.to(
        cards,
        {
            opacity: 1,
            x: 0,
            y: 0,
            scale: 1,
            duration: 0.72,
            stagger: 0.1,
            ease: 'power3.out',
            clearProps: 'transform',
        },
        cardsPosition
    );

    if (cta) {
        timeline.to(
            cta,
            {
                opacity: 1,
                y: 0,
                duration: 0.7,
                clearProps: 'transform',
            },
            ctaPosition
        );
    }
};

const init = () => {
    try {
        initServices();
    } catch (error) {
        document.documentElement.classList.add('anim-failed');
    }
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
} else {
    init();
}
