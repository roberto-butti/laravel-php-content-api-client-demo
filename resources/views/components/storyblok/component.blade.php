@props(['blok'])

@php
    $componentName = str_replace('_', '-', $blok['component'] ?? 'unknown');
@endphp

@if(View::exists('components.storyblok.' . $componentName))
    <x-dynamic-component :component="'storyblok.' . $componentName" :blok="$blok" />
@else
    <div class="alert alert-warning">
        <span>Component "{{ $componentName }}" not found</span>
    </div>
@endif
