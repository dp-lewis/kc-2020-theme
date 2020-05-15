<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class FormsTest extends TestCase
{
    public function testCreationOfTextField(): void
    {
        $myField = \Kc2020\Admin\Forms::text('id', 'name', 'label', 'value');

        $this->assertEquals(
            <<<TEMPLATE
        <p>
            <label for="id">label</label>
            <input class="widefat" id="id" name="name" type="text" value="value" />
        </p>
TEMPLATE,
            $myField
        );
    }

    public function testCreationOfImageUploadField(): void
    {
        $myField = \Kc2020\Admin\Forms::imageUpload('id', 'name', 'label', 'value', 'url');

        $this->assertEquals(
            <<<TEMPLATE
        <p>
            <label>Image Upload</label>
            <img src="url" class="image1tag" width="100" />
            <input type="hidden" class="widefat image1" name="name" id="id" value="value">
            <button class="image_upload1 button-add-media">Select Image</button>
        </p>
TEMPLATE,
            $myField
        );
    }
}