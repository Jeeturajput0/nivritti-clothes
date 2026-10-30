import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

const reducedMotion = () => window.matchMedia('(prefers-reduced-motion: reduce)').matches;

const initLoader = () => {
    const loader = document.querySelector('.site-loader');
    if (!loader) return;

    if (reducedMotion()) {
        loader.hidden = true;
        return;
    }

    gsap.to(loader, {
        autoAlpha: 0,
        delay: 0.18,
        duration: 0.42,
        ease: 'power2.inOut',
        onComplete: () => {
            loader.hidden = true;
        },
    });
};

const initHero = () => {
    const hero = document.querySelector('[data-premium-hero]');
    if (!hero) return;

    const copy = gsap.utils.toArray('.reveal', hero);
    const media = hero.querySelector('[data-hero-media]');
    const path = hero.querySelector('[data-thread-path]');
    const needle = hero.querySelector('[data-thread-needle]');
    const reduced = reducedMotion();

    if (reduced) {
        gsap.set(copy, { clearProps: 'all' });
        gsap.set(path, { opacity: 0 });
        gsap.set(needle, { attr: { visibility: 'hidden' } });
        return;
    }

    const intro = gsap.timeline({ defaults: { ease: 'power3.out' } });
    intro.fromTo(
        copy,
        { opacity: 0, y: 18 },
        { opacity: 1, y: 0, duration: 0.72, stagger: 0.11, clearProps: 'transform' },
        0.12
    );

    if (media) {
        intro.fromTo(
            media,
            { clipPath: 'inset(0 0 100% 0)' },
            { clipPath: 'inset(0 0 0% 0)', duration: 0.95, ease: 'power2.inOut', clearProps: 'clipPath' },
            0
        );
    }

    if (path && needle && window.matchMedia('(min-width: 640px)').matches) {
        const length = path.getTotalLength();
        const progress = { value: 0 };

        gsap.set(path, { strokeDasharray: `${length} ${length}`, strokeDashoffset: length });
        gsap.set(needle, { attr: { visibility: 'visible' } });

        intro.to(
            path,
            { strokeDashoffset: 0, duration: 1.65, ease: 'power2.inOut' },
            0.32
        );
        intro.to(
            progress,
            {
                value: 1,
                duration: 1.65,
                ease: 'power2.inOut',
                onUpdate: () => {
                    const position = length * progress.value;
                    const point = path.getPointAtLength(position);
                    const next = path.getPointAtLength(Math.min(position + 1, length));
                    const angle = Math.atan2(next.y - point.y, next.x - point.x) * (180 / Math.PI);
                    gsap.set(needle, {
                        attr: {
                            transform: `translate(${point.x} ${point.y}) rotate(${angle})`,
                        },
                    });
                },
            },
            0.32
        );
    }

    if (window.matchMedia('(min-width: 768px)').matches && media) {
        gsap.to(hero.querySelectorAll('[data-hero-slide]'), {
            scale: 1.06,
            yPercent: 2,
            ease: 'none',
            scrollTrigger: {
                trigger: hero,
                start: 'top top',
                end: 'bottom top',
                scrub: 0.6,
            },
        });
    }
};

const initScrollProgress = () => {
    const progress = document.querySelector('[data-scroll-progress]');
    if (!progress || reducedMotion()) return;

    ScrollTrigger.create({
        trigger: document.documentElement,
        start: 'top top',
        end: 'bottom bottom',
        onUpdate: (trigger) => {
            gsap.set(progress, { scaleX: trigger.progress });
        },
    });
};

const initStitchDividers = () => {
    if (reducedMotion()) return;

    document.querySelectorAll('[data-stitch-divider]').forEach((divider) => {
        gsap.fromTo(
            divider,
            { scaleX: 0 },
            {
                scaleX: 1,
                duration: 0.75,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: divider.parentElement,
                    start: 'top 82%',
                    once: true,
                },
            }
        );
    });
};

const initFooter = () => {
    const footer = document.querySelector('footer');
    if (!footer || reducedMotion()) return;

    const columns = [...footer.querySelectorAll('.grid > div')];
    if (!columns.length) return;

    gsap.fromTo(
        columns,
        { opacity: 0, y: 18 },
        {
            opacity: 1,
            y: 0,
            duration: 0.65,
            stagger: 0.08,
            clearProps: 'transform',
            scrollTrigger: {
                trigger: footer,
                start: 'top 88%',
                once: true,
            },
        }
    );
};

const initNavbar = () => {
    const navbar = document.getElementById('navbar');
    const navContainer = document.getElementById('nav-container');
    const menuButton = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (navbar && navContainer) {
        const updateScrolledState = () => {
            const isScrolled = window.scrollY > 40;
            navContainer.classList.toggle('mt-4', !isScrolled);
            navContainer.classList.toggle('bg-wine/90', !isScrolled);
            navContainer.classList.toggle('shadow-ink/5', !isScrolled);
            navContainer.classList.toggle('mt-2', isScrolled);
            navContainer.classList.toggle('bg-wine', isScrolled);
            navContainer.classList.toggle('shadow-xl', isScrolled);
        };

        window.addEventListener('scroll', updateScrolledState, { passive: true });
        updateScrolledState();

        if (!reducedMotion()) {
            gsap.fromTo(navContainer, { y: -8 }, { y: 0, duration: 0.7, ease: 'power2.out', clearProps: 'transform' });
        }
    }

    if (!menuButton || !mobileMenu) return;

    const setExpanded = (expanded) => {
        menuButton.setAttribute('aria-expanded', String(expanded));
        menuButton.setAttribute('aria-label', expanded ? 'Close menu' : 'Open menu');
    };
    const closeMenu = (animate = true) => {
        if (mobileMenu.classList.contains('hidden')) return;
        setExpanded(false);

        if (!animate || reducedMotion()) {
            gsap.set(mobileMenu, { clearProps: 'height,opacity' });
            mobileMenu.classList.add('hidden');
            return;
        }

        gsap.to(mobileMenu, {
            height: 0,
            opacity: 0,
            duration: 0.2,
            ease: 'power1.in',
            onComplete: () => {
                mobileMenu.classList.add('hidden');
                gsap.set(mobileMenu, { clearProps: 'height,opacity' });
            },
        });
    };

    menuButton.addEventListener('click', () => {
        if (!mobileMenu.classList.contains('hidden')) {
            closeMenu();
            return;
        }

        mobileMenu.classList.remove('hidden');
        setExpanded(true);
        if (reducedMotion()) return;

        gsap.fromTo(
            mobileMenu,
            { height: 0, opacity: 0 },
            { height: 'auto', opacity: 1, duration: 0.26, ease: 'power2.out', clearProps: 'height,opacity' }
        );
    });

    navbar?.addEventListener('keydown', (event) => {
        if (event.key !== 'Escape' || mobileMenu.classList.contains('hidden')) return;
        closeMenu();
        menuButton.focus();
    });
};

const init = () => {
    initLoader();
    initHero();
    initScrollProgress();
    initStitchDividers();
    initFooter();
    initNavbar();
    ScrollTrigger.refresh();
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init, { once: true });
} else {
    init();
}
