<x-layouts.app
    :title="$story['content']['meta_title'] ?? $story['name']"
    :metaDescription="$story['content']['meta_description'] ?? null"
>
    <x-storyblok.component :blok="$story['content']" />
</x-layouts.app>
