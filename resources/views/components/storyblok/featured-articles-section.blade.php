@props(['blok'])

@php
    $cols = $blok['cols'] ?? '3';
    $gridClass = match($cols) {
        '2' => 'md:grid-cols-2',
        '3' => 'md:grid-cols-3',
        '4' => 'md:grid-cols-4',
        default => 'md:grid-cols-3',
    };
@endphp

<section class="py-16 px-8 bg-base-100">
    <div class="container mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4">
                @foreach($blok['headline'] ?? [] as $segment)
                    <x-storyblok.component :blok="$segment" />
                @endforeach
            </h2>

            @if(!empty($blok['lead']))
                <p class="text-lg opacity-70 max-w-2xl mx-auto">{{ $blok['lead'] }}</p>
            @endif
        </div>

        <div class="grid grid-cols-1 {{ $gridClass }} gap-8">
            @foreach($blok['articles'] ?? [] as $articleUuid)
                <div class="card bg-base-200 shadow-xl">
                    <div class="card-body">
                        <p class="text-sm opacity-50">Article UUID: {{ $articleUuid }}</p>
                        <p class="text-xs">Load article via API or relation</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
