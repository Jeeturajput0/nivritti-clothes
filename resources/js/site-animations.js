import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

const CARD_SELECTOR = 'article, .catalog-card, .cart-row, a.reveal';

const unique = (items) => [...new Set(items.filter(Boolean))];

const isReducedMotion = () => window.matchMedia('(prefers-reduced-motion: reduce)').matches;

/**
 * Split a heading into masked words while preserving inline markup, <br> and
 * natural spaces. Returns the animated word elements.
 */
const splitHeading = (heading) => {
    if (heading.dataset.animSplit === 'true') {
        return gsap.utils.toArray('.anim-word', heading);
    }

    heading.dataset.animSplit = 'true';

    const walker = document.createTreeWalker(heading, NodeFilter.SHOW_TEXT);
    const textNodes = [];
    while (walker.nextNode()) textNodes.push(walker.currentNode);

    textNodes.forEach((node) => {
        if (!node.nodeValue.trim()) {
            return;
        }

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

const closestCard = (element) => element.parentElement?.closest(CARD_SELECTOR) ?? null;

const ARROW_PATTERN = /[↗→]/;

const prepareCta = (cta) => {
    cta.classList.add('anim-cta');

    // Icons rendered from markup (Lucide) already carry the arrow class.
    if (cta.querySelector('.anim-cta-arrow')) return;

    const arrowSpans = [...cta.querySelectorAll('span')].filter(
        (span) => ARROW_PATTERN.test(span.textContent) && span.children.length === 0
    );

    if (arrowSpans.length) {
        arrowSpans[arrowSpans.length - 1].classList.add('anim-cta-arrow');
        return;
    }

    const walker = document.createTreeWalker(cta, NodeFilter.SHOW_TEXT);
    let target = null;

    while (walker.nextNode()) {
        if (ARROW_PATTERN.test(walker.currentNode.nodeValue)) target = walker.currentNode;
    }

    if (!target) return;

    const text = target.nodeValue;
    const index = Math.max(text.lastIndexOf('↗'), text.lastIndexOf('→'));
    if (index === -1) return;

    const arrow = document.createElement('span');
    arrow.className = 'anim-cta-arrow';
    arrow.textContent = text.slice(index, index + 1);

    const before = document.createTextNode(text.slice(0, index));
    const after = document.createTextNode(text.slice(index + 1));

    target.parentNode.insertBefore(before, target);
    target.parentNode.insertBefore(arrow, target);
    target.parentNode.insertBefore(after, target);
    target.parentNode.removeChild(target);
};

const parseStat = (text) => {
    const match = text.trim().match(/^([\d,]+(?:\.\d+)?)(.*)$/);
    if (!match) return null;

    return {
        value: Number.parseFloat(match[1].replace(/,/g, '')),
        suffix: match[2] || '',
        original: text,
        decimals: match[1].includes('.') ? 1 : 0,
    };
};

const animateValue = (timeline, numberElement, position) => {
    const stat = parseStat(numberElement.textContent);
    if (!stat) return;

    const counter = { value: 0 };

    timeline.to(
        counter,
        {
            value: stat.value,
            duration: 0.9,
            ease: 'power2.out',
            onUpdate: () => {
                numberElement.textContent =
                    (stat.decimals ? counter.value.toFixed(1) : Math.round(counter.value)) + stat.suffix;
            },
            onComplete: () => {
                numberElement.textContent = stat.original;
            },
        },
        position + 0.1
    );
};

const buildSection = (section) => {
    const compact = window.matchMedia('(max-width: 639px)').matches;
    const move = (desktop, mobile) => (compact ? mobile : desktop);
    const labels = [];
    const headings = [];
    const texts = [];
    const listItems = [];
    const features = [];
    const cards = [];
    const media = [];
    const ctas = [];
    const forms = [];
    const statBlocks = [];
    const toolbars = [];
    const wrappers = new Set();
    const animatedReveals = new Set();

    // Cards -----------------------------------------------------------------
    section.querySelectorAll(CARD_SELECTOR).forEach((element) => {
        if (closestCard(element)) return;
        if (element.matches('article') || element.matches('.catalog-card, .cart-row')) {
            cards.push(element);
        } else if (element.matches('a.reveal') && element.querySelector('img')) {
            cards.push(element);
        }
    });

    const cardSet = new Set(cards);
    const insideCard = (element) => Boolean(element.parentElement?.closest(CARD_SELECTOR)) || cardSet.has(element);

    // Numeric statistics ----------------------------------------------------
    section.querySelectorAll('.serif').forEach((numberElement) => {
        const text = numberElement.textContent.trim();
        if (!/^[\d,]+(?:\.\d+)?\s*[+%KkMm]?$/.test(text)) return;
        if (numberElement.closest('form, .catalog-card, .cart-row, article')) return;

        const block = numberElement.parentElement;
        if (!block || block.closest('form, .catalog-card, .cart-row, article')) return;
        if (statBlocks.includes(block)) return;

        statBlocks.push({ block, numberElement });
    });

    const insideStat = (element) => statBlocks.some(({ block }) => block === element || block.contains(element));
    const insideReviewSlider = (element) => Boolean(element.closest('.review-slider'));

    // Headings --------------------------------------------------------------
    section.querySelectorAll('h1, h2').forEach((heading) => {
        if (heading.closest('article, .catalog-card, .cart-row, form')) return;
        if (insideStat(heading) || insideReviewSlider(heading)) return;
        headings.push(heading);
    });

    // Labels ----------------------------------------------------------------
    section.querySelectorAll('p').forEach((paragraph) => {
        if (!/uppercase/.test(paragraph.className)) return;
        if (paragraph.closest(CARD_SELECTOR) || paragraph.closest('form') || insideStat(paragraph) || insideReviewSlider(paragraph)) return;
        labels.push(paragraph);
    });

    // Checklist items -------------------------------------------------------
    section.querySelectorAll('p').forEach((paragraph) => {
        const icon = paragraph.querySelector('span');
        if (!icon || icon.textContent.trim() !== '✓') return;
        if (paragraph.closest(CARD_SELECTOR) || paragraph.closest('form') || insideStat(paragraph) || insideReviewSlider(paragraph)) return;
        listItems.push(paragraph);
    });

    const listSet = new Set(listItems);

    // Icon + text feature blocks -------------------------------------------
    section.querySelectorAll('div.flex.items-center.gap-4').forEach((block) => {
        if (!block.querySelector('svg')) return;
        if (block.closest(CARD_SELECTOR) || block.closest('form') || insideStat(block) || insideReviewSlider(block)) return;
        if (listItems.some((item) => item.contains(block))) return;
        features.push(block);
    });

    // Paragraphs ------------------------------------------------------------
    section.querySelectorAll('p').forEach((paragraph) => {
        if (/uppercase/.test(paragraph.className)) return;
        if (listSet.has(paragraph)) return;
        if (paragraph.closest(CARD_SELECTOR) || paragraph.closest('form') || insideStat(paragraph) || insideReviewSlider(paragraph)) return;
        if (features.some((feature) => feature.contains(paragraph))) return;
        if (paragraph.textContent.trim().length < 25) return;
        texts.push(paragraph);
    });

    // Primary calls to action ----------------------------------------------
    section.querySelectorAll('a, button').forEach((control) => {
        const className = control.className || '';
        if (!/(bg-\[#|border-b|px-7 py-4|px-6 py-4)/.test(className)) return;
        if (control.closest(CARD_SELECTOR) || control.closest('form') || insideStat(control) || insideReviewSlider(control)) return;
        ctas.push(control);
    });

    ctas.forEach(prepareCta);

    // Images ----------------------------------------------------------------
    section.querySelectorAll('.image-zoom').forEach((image) => {
        if (closestCard(image)) return;
        media.push(image);
    });

    // Forms -----------------------------------------------------------------
    section.querySelectorAll('form').forEach((form) => forms.push(form));

    // Toolbar for gallery / catalog filters ---------------------------------
    const firstFilter = section.querySelector('.gallery-filter, .catalog-category');
    if (firstFilter) {
        let bar = firstFilter.parentElement;
        if (bar?.parentElement?.classList.contains('flex-col')) bar = bar.parentElement;
        if (bar) toolbars.push(bar);
    }

    // Work out which reveal wrappers contain animated children --------------
    const roles = [
        ...labels,
        ...headings,
        ...texts,
        ...listItems,
        ...features,
        ...cards,
        ...media,
        ...ctas,
        ...forms,
        ...statBlocks.map(({ block }) => block),
    ];

    roles.forEach((role) => {
        if (role.classList?.contains('reveal')) animatedReveals.add(role);
        const wrapper = role.parentElement?.closest('.reveal');
        if (wrapper && wrapper !== role) wrappers.add(wrapper);
    });

    // Remaining reveal blocks ----------------------------------------------
    const simpleBlocks = [...section.querySelectorAll('.reveal')].filter((element) => {
        if (wrappers.has(element) || animatedReveals.has(element)) return false;
        if (element.closest(CARD_SELECTOR)) return false;
        return true;
    });

    if (
        !labels.length &&
        !headings.length &&
        !texts.length &&
        !listItems.length &&
        !features.length &&
        !cards.length &&
        !media.length &&
        !ctas.length &&
        !forms.length &&
        !statBlocks.length &&
        !toolbars.length &&
        !wrappers.size &&
        !simpleBlocks.length
    ) {
        return;
    }

    const lead = Boolean(labels.length || headings.length || texts.length || listItems.length || features.length);
    const headingPosition = labels.length ? 0.1 : 0;
    const textPosition = headingPosition + 0.4;
    const listPosition = textPosition + 0.1;
    const featurePosition = listPosition + (listItems.length ? 0.1 : 0);
    const cardPosition = lead ? 0.55 : 0.05;
    const statPosition = lead ? 0.45 : 0.05;
    const formPosition = lead ? 0.5 : 0.1;
    const mediaPosition = lead ? 0.15 : 0.05;
    const softPosition = mediaPosition + 0.2;
    const ctaPosition = lead ? 0.8 : 0.25;

    const timeline = gsap.timeline({
        defaults: { ease: 'power3.out' },
        scrollTrigger: {
            trigger: section,
            start: 'top 75%',
            once: true,
        },
    });

    // Reveal wrappers are only faded; their children carry the motion. ------
    wrappers.forEach((wrapper, index) => {
        timeline.fromTo(
            wrapper,
            { opacity: 0 },
            { opacity: 1, duration: 0.45, ease: 'power2.out' },
            index * 0.03
        );
    });

    toolbars.forEach((bar, index) => {
        timeline.fromTo(
            bar,
            { opacity: 0, y: 15 },
            { opacity: 1, y: 0, duration: 0.6 },
            0.05 + index * 0.05
        );
    });

    simpleBlocks.forEach((block, index) => {
        timeline.fromTo(
            block,
            { opacity: 0, y: move(22, 18), filter: 'blur(3px)' },
            {
                opacity: 1,
                y: 0,
                filter: 'blur(0px)',
                duration: 0.72,
                onComplete: () => gsap.set(block, { clearProps: 'filter' }),
            },
            0.15 + index * 0.08
        );
    });

    labels.forEach((label, index) => {
        timeline.fromTo(
            label,
            { opacity: 0, y: move(15, 12) },
            { opacity: 1, y: 0, duration: 0.6 },
            headingPosition - 0.1 + index * 0.05
        );
    });

    headings.forEach((heading, index) => {
        const words = splitHeading(heading);
        gsap.set(heading, { opacity: 1 });

        if (!words.length) return;

        gsap.set(words, { yPercent: 75, opacity: 0, filter: 'blur(4px)' });

        timeline.fromTo(
            words,
            { yPercent: 75, opacity: 0, filter: 'blur(4px)' },
            {
                yPercent: 0,
                opacity: 1,
                filter: 'blur(0px)',
                duration: 0.78,
                stagger: 0.045,
                onComplete: () => gsap.set(words, { clearProps: 'filter' }),
            },
            headingPosition + index * 0.08
        );
    });

    texts.forEach((text, index) => {
        timeline.fromTo(
            text,
            { opacity: 0, y: move(25, 18) },
            { opacity: 1, y: 0, duration: 0.75 },
            textPosition + index * 0.08
        );
    });

    listItems.forEach((item, index) => {
        const icon = item.querySelector('span');
        const position = listPosition + index * 0.08;

        timeline.fromTo(
            item,
            { opacity: 0, x: move(-20, -14) },
            { opacity: 1, x: 0, duration: 0.55 },
            position
        );

        if (icon) {
            timeline.fromTo(
                icon,
                { scale: 0.82 },
                { scale: 1, duration: 0.45, ease: 'power2.out', clearProps: 'transform' },
                position + 0.05
            );
        }
    });

    features.forEach((feature, index) => {
        timeline.fromTo(
            feature,
            { opacity: 0, y: move(30, 22) },
            { opacity: 1, y: 0, duration: 0.65 },
            featurePosition + index * 0.1
        );
    });

    statBlocks.forEach(({ block, numberElement }, index) => {
        const position = statPosition + index * 0.1;

        timeline.fromTo(
            block,
            { opacity: 0, y: move(25, 20) },
            { opacity: 1, y: 0, duration: 0.7 },
            position
        );

        animateValue(timeline, numberElement, position);
    });

    forms.forEach((form) => {
        const groups = unique([...form.querySelectorAll('label')].map((label) => label.parentElement));
        const submit = form.querySelector('button[type="submit"], button');
        const label = form.querySelector('p.uppercase');

        if (submit) prepareCta(submit);

        if (form.classList.contains('reveal')) {
            timeline.fromTo(form, { opacity: 0 }, { opacity: 1, duration: 0.35 }, formPosition);
        }

        if (label) {
            timeline.fromTo(label, { opacity: 0, y: 10 }, { opacity: 1, y: 0, duration: 0.5 }, formPosition);
        }

        timeline.fromTo(
            groups,
            { opacity: 0, y: move(12, 10) },
            { opacity: 1, y: 0, duration: 0.5, stagger: 0.05 },
            formPosition + 0.1
        );

        if (submit) {
            timeline.fromTo(
                submit,
                { opacity: 0, y: move(15, 12), scale: 0.98 },
                { opacity: 1, y: 0, scale: 1, duration: 0.6, clearProps: 'transform' },
                formPosition + 0.15 + groups.length * 0.05
            );
        }
    });

    media.forEach((image, index) => {
        const isSecondary = index > 0;

        if (isSecondary) {
            timeline.fromTo(
                image,
                { opacity: 0, y: move(30, 22), scale: 0.96 },
                { opacity: 1, y: 0, scale: 1, duration: 0.9, clearProps: 'transform' },
                softPosition + (index - 1) * 0.12
            );
            return;
        }

        timeline.fromTo(
            image,
            { opacity: 0, clipPath: 'inset(0% 0% 100% 0%)' },
            {
                opacity: 1,
                clipPath: 'inset(0% 0% 0% 0%)',
                duration: 1.15,
                ease: 'power3.inOut',
                onComplete: () => gsap.set(image, { clearProps: 'clipPath' }),
            },
            mediaPosition
        );

        const innerImage = image.querySelector('img');
        if (innerImage) {
            timeline.fromTo(
                innerImage,
                { scale: 1.05 },
                { scale: 1, duration: 1.2, clearProps: 'transform' },
                mediaPosition
            );
        }
    });

    cards.forEach((card, index) => {
        const isCatalog = card.classList.contains('catalog-card');
        const isCartRow = card.classList.contains('cart-row');
        const isReview = Boolean(card.querySelector('blockquote'));
        const position = cardPosition + index * 0.1;

        timeline.fromTo(
            card,
            { opacity: 0, y: move(35, 26), scale: 0.98 },
            {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.85,
                clearProps: 'transform',
            },
            position
        );

        const mediaElement = card.querySelector('.image-zoom');
        if (mediaElement) {
            timeline.fromTo(
                mediaElement,
                { clipPath: 'inset(0% 0% 100% 0%)' },
                {
                    clipPath: 'inset(0% 0% 0% 0%)',
                    duration: 1.05,
                    ease: 'power3.inOut',
                    onComplete: () => gsap.set(mediaElement, { clearProps: 'clipPath' }),
                },
                position + 0.05
            );

            const innerImage = mediaElement.querySelector('img');
            if (innerImage) {
                timeline.fromTo(
                    innerImage,
                    { scale: 1.05 },
                    { scale: 1, duration: 1.15, clearProps: 'transform' },
                    position + 0.05
                );
            }
        }

        let parts = [];

        if (isCatalog) {
            const category = card.querySelector('p.uppercase');
            const title = card.querySelector('h2');
            const description = [...card.querySelectorAll('p')].find((p) => !p.classList.contains('uppercase'));
            const footer = card.querySelector('.border-t');
            parts = [category, title, description, footer];
        } else if (isReview) {
            parts = [card.querySelector('blockquote'), card.querySelector('.mt-8')];
        } else if (!isCartRow) {
            const title = card.querySelector('h3');
            const description = title?.parentElement?.querySelector('p') || card.querySelector('p');
            parts = [title, description];
        }

        parts = parts.filter(Boolean);
        if (parts.length) {
            timeline.fromTo(
                parts,
                { opacity: 0, y: move(14, 12) },
                { opacity: 1, y: 0, duration: 0.55, stagger: 0.07 },
                position + 0.15
            );
        }
    });

    ctas.forEach((cta, index) => {
        timeline.fromTo(
            cta,
            { opacity: 0, y: move(20, 16), scale: 0.96 },
            {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.7,
                ease: 'power2.out',
                clearProps: 'transform',
            },
            ctaPosition + index * 0.08
        );
    });
};

const init = () => {
    window.__nivrittiAnimationsReady = true;

    if (isReducedMotion()) return;

    const main = document.querySelector('main');
    if (!main) return;

    [...main.children]
        .filter(
            (element) =>
                element.tagName === 'SECTION' &&
                !element.hasAttribute('data-premium-hero') &&
                !element.hasAttribute('data-gallery-section') &&
                element.id !== 'about-intro' &&
                element.id !== 'services' &&
                element.id !== 'collection'
        )
        .forEach(buildSection);

    ScrollTrigger.refresh();
    window.__nivrittiRefreshAnimations = () => ScrollTrigger.refresh();
    window.addEventListener('load', () => ScrollTrigger.refresh(), { once: true });
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
} else {
    init();
}
