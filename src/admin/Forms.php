<?php
declare(strict_types=1);

namespace Kc2020\Admin;

final class Forms
{
    private function __construct()
    {
    }

    public static function prepImageUpload()
    {
        add_action('admin_enqueue_scripts', function () {
            $filePath = get_template_directory_uri() . '/build/js/adminforms-imageupload.js';
            wp_enqueue_media();
            wp_enqueue_script('adminforms-imageupload', $filePath);
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

    public static function imageUpload($id, $name, $label, $value)
    {
        return <<<TEMPLATE
        <p>
            <img src="" class="image1tag" width="100" />
            <input class="widefat image1" type="text" name="$name" id="$id" value="$value">
        </p>
        <p>
            <button class="image_upload1 button-add-media">Select Image</button>
        </p>
TEMPLATE;
    }
}
