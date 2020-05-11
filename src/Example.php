<?php declare(strict_types=1);
namespace Kc2020;

final class Example
{
    public function __construct(int $startingNumber)
    {
        $this->number = $startingNumber;
    }

    public function add(int $addThis): int
    {
        $this->number += $addThis;
        return $this->number;
    }
}
