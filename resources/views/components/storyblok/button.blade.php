@props(['blok'])

@php
    $url = $blok['link']['cached_url'] ?? $blok['link']['url'] ?? '#';
    $sizeClass = match($blok['size'] ?? 'medium') {
        'small' => 'btn-sm',
        'large' => 'btn-lg',
        default => '',
    };
    $styleClass = match($blok['style'] ?? 'default') {
        'ghost' => 'btn-ghost',
        'outline' => 'btn-outline',
        default => '',
    };
    $bgClass = match($blok['background_color'] ?? '') {
        'primary' => 'btn-primary',
        'primary-dark' => 'btn-primary',
        'secondary' => 'btn-secondary',
        'highlight-1' => 'btn-accent',
        'white' => 'btn-neutral bg-white text-black',
        default => 'btn-primary',
    };
@endphp

<a href="{{ $url }}" class="btn {{ $sizeClass }} {{ $styleClass }} {{ $bgClass }}">
    {{ $blok['label'] ?? 'Button' }}
</a>
