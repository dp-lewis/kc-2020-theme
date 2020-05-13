<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class StringFormattingTest extends TestCase
{
    public function testConvertPipeSeparatedTextIntoListMarkup(): void
    {
        $myList = \Kc2020\StringFormatting::convertPipeToList('one|two');

        $this->assertEquals(
            '<ul><li>one</li><li>two</li></ul>',
            $myList
        );
    }

    public function testStringWithNoPipeShouldReturnUnchanged(): void
    {
        $myList = \Kc2020\StringFormatting::convertPipeToList('onetwo');

        $this->assertEquals(
            'onetwo',
            $myList
        );
    }
}