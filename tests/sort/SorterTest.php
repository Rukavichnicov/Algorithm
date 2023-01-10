<?php

namespace tests\sort;

use app\sort\BubbleSorter;
use app\sort\MergeSorter;
use app\sort\QuickSorter;
use app\sort\Sorter;
use PHPUnit\Framework\TestCase;

class SorterTest extends TestCase
{
    public function additionProvider(): array
    {
        return [
            [new QuickSorter()],
            [new BubbleSorter()],
            [new MergeSorter()],
        ];
    }

    /**
     * @dataProvider additionProvider
     */
    public function testSortingIsRight(Sorter $sorter): void
    {
        $array = [1, 3, 2, 4, 1, 50];
        $sut = $sorter;

        $arraySort = $sut->sort($array);

        $this->assertSame([1, 1, 2, 3, 4, 50], $arraySort);
    }

    /**
     * @dataProvider additionProvider
     */
    public function testSortingWhenAllNumberSame(Sorter $sorter): void
    {
        $array = [1, 1, 1, 1, 1];
        $sut = $sorter;

        $arraySort = $sut->sort($array);

        $this->assertSame([1, 1, 1, 1, 1], $arraySort);
    }

    /**
     * @dataProvider additionProvider
     */
    public function testSortingWhenAllNumberSameExcludingOne(Sorter $sorter): void
    {
        $array = [1, 50, 1, 1, 1];
        $sut = $sorter;

        $arraySort = $sut->sort($array);

        $this->assertSame([1, 1, 1, 1, 50], $arraySort);
    }

    /**
     * @dataProvider additionProvider
     */
    public function testSortingWhenArrayIsEmpty(Sorter $sorter): void
    {
        $array = [];
        $sut = $sorter;

        $arraySort = $sut->sort($array);

        $this->assertSame([], $arraySort);
    }
}