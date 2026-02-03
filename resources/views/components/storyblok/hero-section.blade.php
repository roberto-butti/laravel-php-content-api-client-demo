@props(['blok'])

<section {!! \App\Services\StoryblokEditable::attributes($blok) !!} class="hero min-h-[500px] bg-base-200">
    <div class="hero-content flex-col lg:flex-row{{ ($blok['layout'] ?? '') === 'split' ? '-reverse' : '' }} gap-8">
        @if(!empty($blok['image']['filename']))
            <img
                src="{{ $blok['image']['filename'] }}/m/800x600"
                alt="{{ $blok['image']['alt'] ?? '' }}"
                class="max-w-sm rounded-lg shadow-2xl"
            />
        @endif

        <div class="text-{{ $blok['text_alignment'] ?? 'left' }}">
            @if(!empty($blok['eyebrow']))
                <p class="text-sm uppercase tracking-wider opacity-70 mb-2">{{ $blok['eyebrow'] }}</p>
            @endif

            <h1 class="text-5xl font-bold">
                @foreach($blok['headline'] ?? [] as $segment)
                    <x-storyblok.component :blok="$segment" />
                @endforeach
            </h1>

            @if(!empty($blok['text']))
                <p class="py-6">{{ $blok['text'] }}</p>
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
</section>
