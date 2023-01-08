<?php

namespace tests\sort;

use app\sort\QuickSorter;
use PHPUnit\Framework\TestCase;

class QuickSorterTest extends TestCase
{
    public function testSortingIsRight(): void
    {
        $array = [1, 3, 2, 4, 1, 50];
        $sut = new QuickSorter();

        $arraySort = $sut->sort($array);

        $this->assertSame([1, 1, 2, 3, 4, 50], $arraySort);
    }

    public function testSortingWhenAllNumberSame(): void
    {
        $array = [1, 1, 1, 1, 1];
        $sut = new QuickSorter();

        $arraySort = $sut->sort($array);

        $this->assertSame([1, 1, 1, 1, 1], $arraySort);
    }

    public function testSortingWhenAllNumberSameExcludingOne(): void
    {
        $array = [1, 50, 1, 1, 1];
        $sut = new QuickSorter();

        $arraySort = $sut->sort($array);

        $this->assertSame([1, 1, 1, 1, 50], $arraySort);
    }

    public function testSortingWhenArrayIsEmpty(): void
    {
        $array = [];
        $sut = new QuickSorter();

        $arraySort = $sut->sort($array);

        $this->assertSame([], $arraySort);
    }
}
