<?php
declare(strict_types=1);

namespace Kc2020\Admin;

final class Forms
{
    private function __construct()
    {
    }

    public static function loadJavaScript()
    {
        add_action('admin_enqueue_scripts', function () {
            $filePath = get_template_directory_uri() . '/build/admin.js';
            wp_enqueue_media();
            wp_enqueue_script('adminforms', $filePath);
        });
    }

    public static function text($id, $name, $label, $value)
    {
        return <<<TEMPLATE
        <p>
            <label for="$id">$label</label>
            <input class="widefat" id="$id" name="$name" type="text" value="$value" />
        </p>
TEMPLATE;
    }

    public static function imageUpload($id, $name, $label, $value, $url)
    {
        return <<<TEMPLATE
        <p class="js-imageuploader">
            <label>$label</label>
            <img src="$url" width="100" style="display: block;" />
            <input type="hidden" class="widefat" name="$name" id="$id" value="$value">
            <button type="button" class="button-add-media">Select Image</button>
        </p>
TEMPLATE;
    }
}
