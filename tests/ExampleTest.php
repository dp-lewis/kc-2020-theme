<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class ExampleTest extends TestCase
{
    public function testCanAddToInitialNumber(): void
    {
        $myExample = new Example(10);
        $this->assertEquals(
            11,
            $myExample->add(1)
        );
    }
}