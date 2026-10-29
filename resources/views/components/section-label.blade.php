@props([
    'label',
    'variant' => 'default',
])

<p {{ $attributes->class([
    'inline-flex items-center gap-3 rounded-full border px-4 py-2 text-xs font-semibold uppercase tracking-wide',
    $variant === 'inverse' ? 'border-white/25 text-white/85' : 'border-slate-300 text-[#102840]',
]) }}>
    <span class="h-2 w-2 shrink-0 rounded-full bg-[#f5df60]" aria-hidden="true"></span>
    {{ $label }}
</p>
