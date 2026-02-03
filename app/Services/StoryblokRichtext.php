<?php

namespace App\Services;

class StoryblokRichtext
{
    public static function render(array|null $content): string
    {
        if (!$content) {
            return '';
        }

        return self::renderNode($content);
    }

    private static function renderNode(array $node): string
    {
        if (!isset($node['type'])) {
            return '';
        }

        return match ($node['type']) {
            'doc' => self::renderChildren($node),
            'paragraph' => '<p>' . self::renderChildren($node) . '</p>',
            'heading' => self::renderHeading($node),
            'bullet_list' => '<ul>' . self::renderChildren($node) . '</ul>',
            'ordered_list' => '<ol>' . self::renderChildren($node) . '</ol>',
            'list_item' => '<li>' . self::renderChildren($node) . '</li>',
            'blockquote' => '<blockquote>' . self::renderChildren($node) . '</blockquote>',
            'code_block' => '<pre><code>' . self::renderChildren($node) . '</code></pre>',
            'horizontal_rule' => '<hr>',
            'hard_break' => '<br>',
            'image' => self::renderImage($node),
            'text' => self::renderText($node),
            default => self::renderChildren($node),
        };
    }

    private static function renderChildren(array $node): string
    {
        $html = '';
        foreach ($node['content'] ?? [] as $child) {
            $html .= self::renderNode($child);
        }
        return $html;
    }

    private static function renderHeading(array $node): string
    {
        $level = $node['attrs']['level'] ?? 2;
        return "<h{$level}>" . self::renderChildren($node) . "</h{$level}>";
    }

    private static function renderImage(array $node): string
    {
        $src = $node['attrs']['src'] ?? '';
        $alt = $node['attrs']['alt'] ?? '';
        $title = $node['attrs']['title'] ?? '';

        return sprintf(
            '<img src="%s" alt="%s" title="%s">',
            e($src),
            e($alt),
            e($title)
        );
    }

    private static function renderText(array $node): string
    {
        $text = e($node['text'] ?? '');

        foreach ($node['marks'] ?? [] as $mark) {
            $text = self::applyMark($text, $mark);
        }

        return $text;
    }

    private static function applyMark(string $text, array $mark): string
    {
        return match ($mark['type']) {
            'bold' => "<strong>{$text}</strong>",
            'italic' => "<em>{$text}</em>",
            'underline' => "<u>{$text}</u>",
            'strike' => "<s>{$text}</s>",
            'code' => "<code>{$text}</code>",
            'link' => self::renderLink($text, $mark),
            'styled' => self::renderStyled($text, $mark),
            'textStyle' => self::renderTextStyle($text, $mark),
            'superscript' => "<sup>{$text}</sup>",
            'subscript' => "<sub>{$text}</sub>",
            'highlight' => "<mark>{$text}</mark>",
            default => $text,
        };
    }

    private static function renderLink(string $text, array $mark): string
    {
        $href = $mark['attrs']['href'] ?? '#';
        $target = $mark['attrs']['target'] ?? null;
        $rel = $mark['attrs']['rel'] ?? null;

        $attrs = sprintf('href="%s"', e($href));

        if ($target) {
            $attrs .= sprintf(' target="%s"', e($target));
        }

        if ($rel) {
            $attrs .= sprintf(' rel="%s"', e($rel));
        }

        return "<a {$attrs}>{$text}</a>";
    }

    private static function renderStyled(string $text, array $mark): string
    {
        $class = $mark['attrs']['class'] ?? '';
        return $class ? "<span class=\"{$class}\">{$text}</span>" : $text;
    }

    private static function renderTextStyle(string $text, array $mark): string
    {
        $color = $mark['attrs']['color'] ?? null;

        if ($color) {
            return "<span style=\"color: {$color}\">{$text}</span>";
        }

        return $text;
    }
}
