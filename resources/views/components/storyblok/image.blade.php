@props([
    'image',
    'sizes' => '100vw',
    'widths' => [400, 600, 800, 1200, 1600, 2000],
    'ratio' => null,
    'class' => '',
    'loading' => 'lazy',
    'fetchpriority' => null,
    'quality' => 80,
    'smart' => false,
])

@php
    $filename = $image['filename'] ?? '';
    $alt = $image['alt'] ?? '';
    $title = $image['title'] ?? '';
    $focus = $image['focus'] ?? '';

    if (empty($filename)) {
        return;
    }

    /**
     * Build Storyblok Image Service URL
     * @see https://www.storyblok.com/docs/api/image-service
     *
     * Format: {filename}/m/{width}x{height}/smart/filters:{filter1}:{filter2}
     * - /m/ prefix enables WebP conversion
     * - {width}x{height} for resize (use 0 for auto, e.g., 800x0)
     * - /smart for smart cropping (face detection)
     * - /filters:focal(x,y) for focal point cropping
     * - /filters:quality(0-100) for compression
     */
    $buildUrl = function ($width) use ($filename, $ratio, $focus, $quality, $smart) {
        $height = $ratio ? round($width / $ratio) : 0;
        $dimensions = "{$width}x{$height}";

        $url = "{$filename}/m/{$dimensions}";

        // Add smart cropping if enabled (uses face detection)
        if ($smart && $height > 0) {
            $url .= "/smart";
        }

        // Build filters
        $filters = [];

        // Focal point filter (only applies when cropping, i.e., height > 0)
        // Storyblok focus format: "leftX:leftY:rightX:rightY" or "pointX:pointY"
        if ($focus && $height > 0 && !$smart) {
            $filters[] = "focal({$focus})";
        }

        // Quality filter
        if ($quality && $quality < 100) {
            $filters[] = "quality({$quality})";
        }

        if (!empty($filters)) {
            $url .= "/filters:" . implode(':', $filters);
        }

        return $url;
    };

    // Build srcset with multiple widths
    $srcset = collect($widths)->map(function ($width) use ($buildUrl) {
        return "{$buildUrl($width)} {$width}w";
    })->implode(', ');

    // Default src (medium size fallback)
    $defaultWidth = $widths[2] ?? 800;
    $src = $buildUrl($defaultWidth);
@endphp

@if($filename)
<img
    src="{{ $src }}"
    srcset="{{ $srcset }}"
    sizes="{{ $sizes }}"
    alt="{{ $alt }}"
    @if($title) title="{{ $title }}" @endif
    @if($loading) loading="{{ $loading }}" @endif
    @if($fetchpriority) fetchpriority="{{ $fetchpriority }}" @endif
    decoding="async"
    @class([$class])
/>
@endif
