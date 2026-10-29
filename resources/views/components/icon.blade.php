@props(['name' => 'arrow-up-right', 'size' => 'h-4 w-4'])

@php
    // Lucide icon paths (https://lucide.dev) rendered as inline SVG.
    $icons = [
        'arrow-up-right' => '<path d="M7 7h10v10"/><path d="M7 17 17 7"/>',
        'arrow-right' => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
    ];

    $shape = $icons[$name] ?? $icons['arrow-up-right'];
@endphp

<svg
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 24 24"
    fill="none"
    stroke="currentColor"
    stroke-width="2"
    stroke-linecap="round"
    stroke-linejoin="round"
    aria-hidden="true"
    {{ $attributes->merge(['class' => $size]) }}
>{!! $shape !!}</svg>
