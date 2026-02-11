<?php

namespace App\Services;

use Storyblok\Tiptap\Extension\Storyblok;
use Tiptap\Editor;

class StoryblokRichtext
{
    public static function render(?array $content): string
    {
        if (! $content) {
            return '';
        }

        $editor = new Editor([
            'extensions' => [
                new Storyblok([
                    'blokOptions' => [
                        'renderer' => fn (array $blok) => view(
                            'components.storyblok.component',
                            ['blok' => $blok],
                        )->render(),
                    ],
                    'override_extensions' => [
                        'image' => new MyImage,
                    ],
                ]),
            ],
        ]);

        return $editor->setContent($content)->getHTML();
    }
}
