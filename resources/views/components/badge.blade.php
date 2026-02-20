@props(['type' => 'slate'])

@php
    $colorClasses = [
        'slate' => 'bg-slate-100 border border-slate-500 text-slate-500',
        'blue' => 'bg-blue-100 border border-blue-500 text-blue-500',
        'red' => 'bg-red-100 border border-red-500 text-red-500',
        'green' => 'bg-green-100 border border-green-500 text-green-500',
        'yellow' => 'bg-yellow-100 border border-yellow-500 text-yellow-500',
        'pink' => 'bg-pink-100 border border-pink-500 text-pink-500',
        'orange' => 'bg-orange-100 border border-orange-500 text-orange-500'
    ];

    // Default to slate if the type is not recognized
    $classes = $colorClasses[$type] ?? $colorClasses['slate'];
@endphp

<span {{ $attributes->merge(['class' => "text-xs tracking-widest font-semibold py-1 px-3 rounded-full uppercase $classes"]) }}>
    {{ $slot }}
</span>

