@props(['blok'])

@foreach($blok['body'] ?? [] as $nestedBlok)
    <x-storyblok.component :blok="$nestedBlok" />
@endforeach
