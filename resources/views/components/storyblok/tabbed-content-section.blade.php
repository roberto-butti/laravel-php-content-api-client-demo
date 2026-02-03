@props(['blok'])

<section {!! \App\Services\StoryblokEditable::attributes($blok) !!} class="py-16 px-8 bg-base-100">
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

        <div role="tablist" class="tabs tabs-boxed mb-8 justify-center">
            @foreach($blok['entries'] ?? [] as $index => $entry)
                <input
                    type="radio"
                    name="tabs-{{ $blok['_uid'] }}"
                    role="tab"
                    class="tab"
                    aria-label="{{ $entry['headline'] ?? 'Tab ' . ($index + 1) }}"
                    @if($index === 0) checked @endif
                />
            @endforeach
        </div>

        @foreach($blok['entries'] ?? [] as $index => $entry)
            <div class="{{ $index === 0 ? '' : 'hidden' }}" data-tab-content="{{ $index }}">
                <x-storyblok.component :blok="$entry" />
            </div>
        @endforeach
    </div>
</section>
