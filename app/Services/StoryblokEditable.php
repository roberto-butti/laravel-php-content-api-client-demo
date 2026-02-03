<?php

namespace App\Services;

class StoryblokEditable
{
    /**
     * Get editable data attributes for a Storyblok blok.
     *
     * @return array{data-blok-c?: string, data-blok-uid?: string}
     */
    public static function get(array|null $blok): array
    {
        if (!is_array($blok) || !isset($blok['_editable'])) {
            return [];
        }

        try {
            $editable = $blok['_editable'];
            $json = preg_replace('/^<!--#storyblok#/', '', $editable);
            $json = preg_replace('/-->$/', '', $json);

            $options = json_decode($json, true);

            if ($options && isset($options['id'], $options['uid'])) {
                return [
                    'data-blok-c' => json_encode($options),
                    'data-blok-uid' => $options['id'] . '-' . $options['uid'],
                ];
            }

            return [];
        } catch (\Throwable) {
            return [];
        }
    }

    /**
     * Get editable attributes as an HTML string.
     */
    public static function attributes(array|null $blok): string
    {
        $attrs = self::get($blok);

        if (empty($attrs)) {
            return '';
        }

        $html = [];
        foreach ($attrs as $key => $value) {
            $html[] = sprintf('%s="%s"', $key, e($value));
        }

        return implode(' ', $html);
    }
}
