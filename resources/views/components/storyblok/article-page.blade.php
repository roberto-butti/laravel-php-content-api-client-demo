@props(['blok'])

<article {!! \App\Services\StoryblokEditable::attributes($blok) !!} class="py-16 px-8 bg-base-100">
    <div class="container mx-auto max-w-4xl">
        @if(!empty($blok['image']['filename']))
            <figure class="mb-8">
                <x-storyblok.image
                    :image="$blok['image']"
                    sizes="(max-width: 768px) 100vw, (max-width: 1024px) 80vw, 896px"
                    :ratio="3/2"
                    class="w-full rounded-lg shadow-xl"
                    loading="eager"
                    fetchpriority="high"
                />
            </figure>
        @endif

        @if(!empty($blok['headline']))
            <h1 class="text-4xl lg:text-5xl font-bold mb-8">{{ $blok['headline'] }}</h1>
        @endif

        @if(!empty($blok['text']))
            <div class="prose prose-lg max-w-none">
                <x-storyblok.richtext :content="$blok['text']" />
            </div>
        @endif

        @if(!empty($blok['call_to_action']))
            <div class="mt-12 flex flex-wrap gap-4">
                @foreach($blok['call_to_action'] as $cta)
                    <x-storyblok.component :blok="$cta" />
                @endforeach
            </div>
        @endif
    </div>
</article>
