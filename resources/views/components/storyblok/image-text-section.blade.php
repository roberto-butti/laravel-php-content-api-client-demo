@props(['blok'])

@php
    $reverse = $blok['reverse_desktop_layout'] ?? false;
@endphp

<section class="py-16 px-8 bg-base-100">
    <div class="container mx-auto">
        <div class="flex flex-col {{ $reverse ? 'lg:flex-row-reverse' : 'lg:flex-row' }} gap-12 items-center">
            @if(!empty($blok['image']['filename']))
                <div class="lg:w-1/2">
                    <img
                        src="{{ $blok['image']['filename'] }}/m/600x800"
                        alt="{{ $blok['image']['alt'] ?? '' }}"
                        class="rounded-lg shadow-xl"
                    />
                </div>
            @endif

            <div class="lg:w-1/2">
                @if(!empty($blok['eyebrow']))
                    <p class="text-sm uppercase tracking-wider opacity-70 mb-2">{{ $blok['eyebrow'] }}</p>
                @endif

                <h2 class="text-4xl font-bold mb-6">
                    @foreach($blok['headline'] ?? [] as $segment)
                        <x-storyblok.component :blok="$segment" />
                    @endforeach
                </h2>

                @if(!empty($blok['text']))
                    <div class="prose mb-6">
                        <x-storyblok.richtext :content="$blok['text']" />
                    </div>
                @endif

                @if(!empty($blok['buttons']))
                    <div class="flex flex-wrap gap-4">
                        @foreach($blok['buttons'] as $button)
                            <x-storyblok.component :blok="$button" />
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
