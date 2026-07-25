{{-- resources/views/components/glass-card.blade.php --}}

@props([
    'tag'     => 'div',          // HTML tag: div, details, section, dll.
    'rounded' => 'rounded-2xl',  // Ukuran border-radius
    'shadow'  => 'shadow-sm',
    'class'   => '',
])

<{{ $tag }}
    {{ $attributes->merge([
        'class' => "glass-card {$rounded} overflow-hidden {$shadow}
                    transition-all duration-300 {$class}"
    ]) }}>
    {{ $slot }}
</{{ $tag }}>
