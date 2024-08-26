@php use Filament\Support\Facades\FilamentIcon; @endphp
@php use Illuminate\Contracts\Support\Htmlable; @endphp
@props([
    'alias' => null,
    'class' => '',
    'icon' => null,
])

@php
    $icon = ($alias ? FilamentIcon::resolve($alias) : null) ?: ($icon ?? $slot);
@endphp

@if ($icon instanceof Htmlable)
    <span {{ $attributes->class($class) }}>
        {{ $icon }}
    </span>
@elseif (str_contains($icon, '/'))
    <img
        {{
            $attributes
                ->merge(['src' => $icon])
                ->class($class)
        }}
    />
@else
    @svg(
        $icon,
        $class,
        array_filter($attributes->getAttributes()),
    )
@endif
