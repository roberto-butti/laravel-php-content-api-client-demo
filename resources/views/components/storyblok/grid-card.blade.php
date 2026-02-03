@props(['blok'])

<div {!! \App\Services\StoryblokEditable::attributes($blok) !!} class="card bg-base-200 shadow-xl">
    <figure class="px-10 pt-10">
        @if(!empty($blok['icon']['filename']))
            <img
                src="{{ $blok['icon']['filename'] }}/m/{{ $blok['icon_width'] ?? '80' }}x0"
                alt="{{ $blok['icon']['alt'] ?? '' }}"
                class="w-20 h-20 object-contain"
            />
        @endif
    </figure>
    <div class="card-body items-center text-center">
        @if(!empty($blok['label']))
            <h3 class="card-title">{{ $blok['label'] }}</h3>
        @endif

        @if(!empty($blok['text']))
            <p>{{ $blok['text'] }}</p>
        @endif

        @if(!empty($blok['button']))
            <div class="card-actions">
                @foreach($blok['button'] as $button)
                    <x-storyblok.component :blok="$button" />
                @endforeach
            </div>
        @endif
    </div>
</div>
