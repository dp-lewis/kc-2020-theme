<?php
namespace Kc2020;

class StringFormatting
{
    public static function convertPipeToList($str)
    {
        if (!strpos($str, '|')) {
            return $str;
        }

        $items = explode('|', $str);
        $html = '<ul>';

        foreach ($items as $item) {
            $html .= '<li>' . $item . '</li>';
        }

        $html .= '</ul>';

        return $html;
    }
}
