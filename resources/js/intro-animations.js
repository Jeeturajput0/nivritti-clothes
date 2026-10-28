import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

/**
 * Reveal every intro element instantly. Used for reduced-motion users and as
 * a safety net when the animation cannot run.
 */
const revealEverything = (section) => {
    const items = section.querySelectorAll(
        '[data-intro-label], [data-intro-description], [data-intro-point], [data-intro-feature], [data-intro-cta], [data-intro-contact]'
    );

    items.forEach((item) => {
        item.style.opacity = '1';
        item.style.transform = 'none';
    });

    section.querySelectorAll('.heading-word').forEach((word) => {
        word.style.opacity = '1';
        word.style.transform = 'none';
        word.style.filter = 'none';
    });

    section.querySelector('.intro-heading')?.classList.add('is-revealed');
};

const initIntroAnimation = () => {
    const section = document.getElementById('about-intro');
    if (!section) return;

    const heading = section.querySelector('.intro-heading');
    const words = heading ? gsap.utils.toArray('.heading-word', heading) : [];

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        revealEverything(section);
        return;
    }

    gsap.context(() => {
        const timeline = gsap.timeline({
            defaults: { ease: 'power3.out' },
            scrollTrigger: {
                trigger: section,
                start: 'top 75%',
                once: false,
                toggleActions: 'play reverse play reverse',
            },
        });

        // About us label
        const label = section.querySelector('[data-intro-label]');
        if (label) {
            timeline.fromTo(
                label,
                { opacity: 0, y: 15 },
                { opacity: 1, y: 0, duration: 0.28 },
                0
            );
        }

        // Main heading — masked, word-by-word, blur-to-sharp reveal
        if (words.length) {
            timeline.fromTo(
                words,
                { yPercent: 115, opacity: 0, filter: 'blur(8px)' },
                {
                    yPercent: 0,
                    opacity: 1,
                    filter: 'blur(0px)',
                    duration: 0.48,
                    stagger: 0.024,
                    onComplete: () => {
                        heading.classList.add('is-revealed');
                        gsap.set(words, { clearProps: 'filter' });
                    },
                },
                0.06
            );
        }

        // Description — follows the heading
        const description = section.querySelector('[data-intro-description]');
        if (description) {
            timeline.fromTo(
                description,
                { opacity: 0, y: 25 },
                { opacity: 1, y: 0, duration: 0.33 },
                0.62
            );
        }

        // Feature checklist — one by one
        const points = section.querySelectorAll('[data-intro-point]');
        if (points.length) {
            timeline.fromTo(
                points,
                { opacity: 0, x: -20 },
                { opacity: 1, x: 0, duration: 0.32, stagger: 0.035 },
                0.9
            );
        }

        // Feature blocks — rise from below with a small stagger
        const features = section.querySelectorAll('[data-intro-feature]');
        if (features.length) {
            timeline.fromTo(
                features,
                { opacity: 0, y: 30 },
                { opacity: 1, y: 0, duration: 0.35, stagger: 0.05 },
                1.08
            );
        }

        // CTA — fade, rise and settle from a subtle scale
        const cta = section.querySelector('[data-intro-cta]');
        if (cta) {
            timeline.fromTo(
                cta,
                { opacity: 0, y: 20, scale: 0.96 },
                {
                    opacity: 1,
                    y: 0,
                    scale: 1,
                    duration: 0.32,
                    ease: 'power2.out',
                    clearProps: 'transform',
                },
                1.28
            );
        }

        // Supporting contact block
        const contact = section.querySelector('[data-intro-contact]');
        if (contact) {
            timeline.fromTo(
                contact,
                { opacity: 0, y: 15 },
                { opacity: 1, y: 0, duration: 0.28 },
                1.35
            );
        }

        // Main image — slides in from the right as the section enters view
        const mainImage = section.querySelector('[data-intro-image]');
        if (mainImage) {
            timeline.fromTo(
                mainImage,
                { opacity: 0, x: 70, clipPath: 'inset(0% 100% 0% 0%)' },
                {
                    opacity: 1,
                    x: 0,
                    clipPath: 'inset(0% 0% 0% 0%)',
                    duration: 0.7,
                    ease: 'power3.out',
                    clearProps: 'transform,clipPath',
                },
                0.2
            );
        }

        // Secondary image — fade, lift and scale into place
        const secondaryImage = section.querySelector('[data-intro-image-secondary]');
        if (secondaryImage) {
            timeline.fromTo(
                secondaryImage,
                { opacity: 0, scale: 0.95, y: 30 },
                { opacity: 1, scale: 1, y: 0, duration: 0.9, clearProps: 'transform' },
                0.55
            );
        }
    }, section);
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initIntroAnimation);
} else {
    initIntroAnimation();
}
