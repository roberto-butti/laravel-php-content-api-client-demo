@props(['blok'])

<section {!! \App\Services\StoryblokEditable::attributes($blok) !!} class="py-8 px-8 bg-base-200">
    <div class="container mx-auto">
        @foreach($blok['banners'] ?? [] as $bannerUuid)
            <div class="alert">
                <span>Banner UUID: {{ $bannerUuid }} - Load via API or relation</span>
            </div>
        @endforeach
    </div>
</section>
