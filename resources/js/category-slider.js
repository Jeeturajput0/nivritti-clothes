const initCategorySlider = (root) => {
    const track = root.querySelector('[data-category-track]');
    const cards = [...root.querySelectorAll('[data-category-slide]')];
    const previousButton = document.querySelector('[data-category-prev]');
    const nextButton = document.querySelector('[data-category-next]');

    if (!track || !cards.length || !previousButton || !nextButton) return;

    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    let index = 0;
    let direction = 1;
    let timer = null;
    let paused = false;

    const getMetrics = () => {
        const cardWidth = cards[0].getBoundingClientRect().width;
        const maxOffset = Math.max(0, track.scrollWidth - root.clientWidth);

        return {
            cardWidth,
            maxIndex: cardWidth ? Math.ceil(maxOffset / cardWidth) : 0,
            maxOffset,
        };
    };

    const update = () => {
        const { cardWidth, maxIndex, maxOffset } = getMetrics();
        index = Math.min(index, maxIndex);
        const offset = Math.min(index * cardWidth, maxOffset);

        track.style.transform = `translate3d(-${offset}px, 0, 0)`;
        previousButton.disabled = index === 0;
        nextButton.disabled = index === maxIndex;
        previousButton.setAttribute('aria-disabled', String(previousButton.disabled));
        nextButton.setAttribute('aria-disabled', String(nextButton.disabled));
    };

    const stopAutoplay = () => {
        if (timer !== null) {
            window.clearTimeout(timer);
            timer = null;
        }
    };

    const scheduleAutoplay = () => {
        stopAutoplay();
        if (paused || document.hidden || reducedMotion.matches || getMetrics().maxIndex === 0) return;

        timer = window.setTimeout(() => {
            const { maxIndex } = getMetrics();
            if (index >= maxIndex) direction = -1;
            if (index <= 0) direction = 1;
            index += direction;
            update();
            scheduleAutoplay();
        }, 3500);
    };

    previousButton.addEventListener('click', () => {
        index = Math.max(0, index - 1);
        direction = -1;
        update();
        scheduleAutoplay();
    });

    nextButton.addEventListener('click', () => {
        index = Math.min(getMetrics().maxIndex, index + 1);
        direction = 1;
        update();
        scheduleAutoplay();
    });

    root.addEventListener('mouseenter', () => {
        paused = true;
        stopAutoplay();
    });
    root.addEventListener('mouseleave', () => {
        paused = false;
        scheduleAutoplay();
    });
    root.addEventListener('focusin', () => {
        paused = true;
        stopAutoplay();
    });
    root.addEventListener('focusout', (event) => {
        if (root.contains(event.relatedTarget)) return;
        paused = false;
        scheduleAutoplay();
    });
    document.addEventListener('visibilitychange', scheduleAutoplay);
    reducedMotion.addEventListener('change', scheduleAutoplay);
    window.addEventListener('resize', update, { passive: true });

    update();
    scheduleAutoplay();
};

const init = () => {
    document.querySelectorAll('[data-category-slider]').forEach(initCategorySlider);
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init, { once: true });
} else {
    init();
}
