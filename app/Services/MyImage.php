<?php

namespace App\Services;

use Tiptap\Core\Node;
use Tiptap\Utils\HTML;

class MyImage extends Node
{
    public static $name = 'image';

    public function addOptions()
    {
        return [
            'HTMLAttributes' => [],
        ];
    }

    public function parseHTML()
    {
        return [
            [
                'tag' => 'img[src]',
            ],
        ];
    }

    public function addAttributes()
    {
        return [
            'src' => [],
            'alt' => [],
            'title' => [],
            'width' => [],
            'height' => [],
            'copyright' => [],
        ];
    }

    public function renderHTML($node, $HTMLAttributes = [])
    {
        $imgAttrs = HTML::mergeAttributes(
            $this->options['HTMLAttributes'],
            $HTMLAttributes,
        );

        $copyright = $node->attrs->copyright ?? null;
        $alt = $node->attrs->alt ?? null;

        $imgTag = '<img'.HTML::renderAttributes($imgAttrs).'>';
        $html = '<figure>'.$imgTag;

        if ($copyright) {
            $html .= '<footer><small>'.htmlspecialchars($copyright, ENT_QUOTES, 'UTF-8').'</small></footer>';
        }

        if ($alt) {
            $html .= '<figcaption>'.htmlspecialchars($alt, ENT_QUOTES, 'UTF-8').'</figcaption>';
        }

        $html .= '</figure>';

        return ['content' => $html];
    }
}
