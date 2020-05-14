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
        $myField = \Kc2020\Admin\Forms::imageUpload('id', 'name', 'label', 'value');

        $this->assertEquals(
            <<<TEMPLATE
        <p>
            <img src="" class="image1tag" width="100" />
            <input class="widefat image1" type="text" name="name" id="id" value="value">
        </p>
        <p>
            <button class="image_upload1 button-add-media">Select Image</button>
        </p>
TEMPLATE,
            $myField
        );
    }
}