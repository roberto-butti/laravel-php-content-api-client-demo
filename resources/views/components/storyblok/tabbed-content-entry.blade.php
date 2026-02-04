@props(['blok'])

<div {!! \App\Services\StoryblokEditable::attributes($blok) !!} class="flex flex-col lg:flex-row gap-8 items-center">
    @if(!empty($blok['image']['filename']))
        <div class="lg:w-1/2">
            <x-storyblok.image
                :image="$blok['image']"
                sizes="(max-width: 1024px) 100vw, 50vw"
                :widths="[400, 600, 800, 1000]"
                :ratio="1/1"
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
