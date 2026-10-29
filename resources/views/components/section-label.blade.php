@props([
    'label',
    'variant' => 'default',
])

<p {{ $attributes->class([
    'inline-flex items-center gap-3 rounded-full border px-4 py-2 text-xs font-semibold uppercase tracking-wide',
    $variant === 'inverse' ? 'border-ivory/25 text-ivory/85' : 'border-ink/15 text-ink',
]) }}>
    <span class="h-2 w-2 shrink-0 rounded-full bg-brass" aria-hidden="true"></span>
    {{ $label }}
</p>
