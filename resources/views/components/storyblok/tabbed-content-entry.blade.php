@props(['blok'])

<div class="flex flex-col lg:flex-row gap-8 items-center">
    @if(!empty($blok['image']['filename']))
        <div class="lg:w-1/2">
            <img
                src="{{ $blok['image']['filename'] }}/m/600x600"
                alt="{{ $blok['image']['alt'] ?? '' }}"
                class="rounded-lg shadow-xl"
            />
        </div>
    @endif

    <div class="lg:w-1/2">
        <h3 class="text-2xl font-bold mb-4">{{ $blok['headline'] ?? '' }}</h3>

        @if(!empty($blok['description']))
            <div class="prose">
                <x-storyblok.richtext :content="$blok['description']" />
            </div>
        @endif

        @if(!empty($blok['button']))
            <div class="mt-6">
                @foreach($blok['button'] as $button)
                    <x-storyblok.component :blok="$button" />
                @endforeach
            </div>
        @endif
    </div>
</div>
