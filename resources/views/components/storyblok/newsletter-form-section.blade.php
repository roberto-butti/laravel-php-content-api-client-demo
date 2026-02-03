@props(['blok'])

<section {!! \App\Services\StoryblokEditable::attributes($blok) !!} class="py-16 px-8 bg-primary text-primary-content">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-6">
            @foreach($blok['headline'] ?? [] as $segment)
                <x-storyblok.component :blok="$segment" />
            @endforeach
        </h2>

        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center max-w-md mx-auto">
            <input
                type="email"
                placeholder="Enter your email"
                class="input input-bordered w-full"
            />
            @if(!empty($blok['button']))
                @foreach($blok['button'] as $button)
                    <x-storyblok.component :blok="$button" />
                @endforeach
            @else
                <button class="btn btn-accent">Subscribe</button>
            @endif
        </div>
    </div>
</section>
