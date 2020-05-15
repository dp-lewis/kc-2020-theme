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
        <p>
            <label>Image Upload</label>
            <img src="$url" class="image1tag" width="100" />
            <input type="hidden" class="widefat image1" name="$name" id="$id" value="$value">
            <button class="image_upload1 button-add-media">Select Image</button>
        </p>
TEMPLATE;
    }
}
