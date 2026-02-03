@props(['blok'])

@php
    $highlightClass = match($blok['highlight'] ?? '') {
        'color_1' => 'text-primary',
        'color_2' => 'text-secondary',
        'color_3' => 'text-accent',
        default => '',
    };
@endphp

<span class="{{ $highlightClass }}">{{ $blok['text'] ?? '' }}</span>
