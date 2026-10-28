import gsap from 'gsap';

const AUTOPLAY_DELAY = 5000;
const OUT_DURATION = 0.7;
const IN_OFFSET = 0.4;

const initReviewSlider = (root) => {
    const slides = gsap.utils.toArray('[data-review-slide]', root);
    const dots = gsap.utils.toArray('[data-review-dot]', root);
    if (slides.length < 2) return;

    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    const stage = root.querySelector('.review-stage');

    let index = 0;
    let queued = null;
    let animating = false;
    let paused = false;
    let inView = false;
    let timer = null;

    slides.forEach((slide, slideIndex) => {
        if (slideIndex !== 0) {
            gsap.set(slide, { opacity: 0, visibility: 'hidden' });
        }
    });

    const clearTimer = () => {
        if (timer !== null) {
            window.clearTimeout(timer);
            timer = null;
        }
    };

    const schedule = () => {
        clearTimer();
        if (!inView || paused) return;

        timer = window.setTimeout(() => {
            timer = null;
            go(index + 1);
        }, AUTOPLAY_DELAY);
    };

    const updateDots = () => {
        dots.forEach((dot, dotIndex) => {
            const active = dotIndex === index;
            dot.classList.toggle('is-active', active);

            if (active) {
                dot.setAttribute('aria-current', 'true');
            } else {
                dot.removeAttribute('aria-current');
            }
        });
    };

    const settle = () => {
        animating = false;

        if (queued !== null) {
            const next = queued;
            queued = null;
            go(next);
        }
    };

    const resetSlide = (slide) => {
        gsap.set(slide, { visibility: 'hidden' });
        gsap.set(slide, { clearProps: 'opacity,transform,filter' });
    };

    const fadeTransition = (current, target) => {
        const timeline = gsap.timeline({ onComplete: settle });
        timeline.to(current, { opacity: 0, duration: 0.35, ease: 'power1.out' });
        timeline.set(target, { visibility: 'visible' }, 0.25);
        timeline.fromTo(
            target,
            { opacity: 0 },
            { opacity: 1, duration: 0.45, ease: 'power2.out' },
            0.25
        );
        timeline.call(() => resetSlide(current));
    };

    const slideTransition = (current, target) => {
        const quote = target.querySelector('.review-quote');
        const text = target.querySelector('[data-review-text]');
        const name = target.querySelector('[data-review-name]');
        const role = target.querySelector('[data-review-role]');
        const avatar = target.querySelector('[data-review-avatar]');

        gsap.set(target, { visibility: 'visible', opacity: 1, x: 0, filter: 'none' });
        gsap.set([quote, name, role, avatar], { opacity: 0 });
        gsap.set(text, { opacity: 0, x: 40, filter: 'blur(4px)' });
        gsap.set(name, { x: 24 });
        gsap.set(avatar, { scale: 0.96 });

        const timeline = gsap.timeline({
            defaults: { ease: 'power3.out' },
            onComplete: settle,
        });

        timeline.to(
            current,
            { opacity: 0, x: -40, filter: 'blur(4px)', duration: OUT_DURATION },
            0
        );

        timeline.to(quote, { opacity: 1, duration: 0.55 }, IN_OFFSET);
        timeline.to(
            text,
            { opacity: 1, x: 0, filter: 'blur(0px)', duration: 0.7 },
            IN_OFFSET + 0.08
        );
        timeline.to(name, { opacity: 1, x: 0, duration: 0.55 }, IN_OFFSET + 0.18);
        timeline.to([role, avatar], { opacity: 1, scale: 1, duration: 0.5 }, IN_OFFSET + 0.25);

        timeline.call(() => resetSlide(current));
    };

    const go = (next) => {
        const normalized = (next + slides.length) % slides.length;

        if (animating) {
            queued = normalized;
            return;
        }

        if (normalized === index) {
            schedule();
            return;
        }

        clearTimer();
        animating = true;

        const current = slides[index];
        index = normalized;

        slides.forEach((slide, slideIndex) => {
            slide.classList.toggle('is-active', slideIndex === index);
        });

        updateDots();

        const target = slides[normalized];

        if (reducedMotion.matches) {
            fadeTransition(current, target);
        } else {
            slideTransition(current, target);
        }

        schedule();
    };

    dots.forEach((dot, dotIndex) => {
        dot.addEventListener('click', () => {
            go(dotIndex);
        });
    });

    const pause = () => {
        paused = true;
        clearTimer();
    };

    const resume = () => {
        paused = false;
        schedule();
    };

    root.addEventListener('mouseenter', pause);
    root.addEventListener('mouseleave', resume);
    root.addEventListener('focusin', pause);
    root.addEventListener('focusout', (event) => {
        if (!root.contains(event.relatedTarget)) resume();
    });

    if ('IntersectionObserver' in window && stage) {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    inView = entry.isIntersecting;
                    if (inView) {
                        schedule();
                    } else {
                        clearTimer();
                    }
                });
            },
            { threshold: 0.35 }
        );

        observer.observe(stage);
    } else {
        inView = true;
        schedule();
    }

    updateDots();
};

const init = () => {
    document.querySelectorAll('[data-review-slider]').forEach(initReviewSlider);
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
} else {
    init();
}
