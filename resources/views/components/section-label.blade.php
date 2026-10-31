@props([
    'label',
    'variant' => 'default',
])

<p {{ $attributes->class([
    'inline-flex items-center gap-3 rounded-full border px-4 py-2 text-xs font-semibold uppercase tracking-wide',
    $variant === 'inverse' ? 'border-brass/40 text-brass' : 'border-brass/40 text-brass-deep',
]) }}>
    <span class="h-2 w-2 shrink-0 rounded-full bg-gradient-to-r from-[#D99A16] via-[#E8B52F] to-[#D49A16]" aria-hidden="true"></span>
    {{ $label }}
</p>
