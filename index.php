<?php

use app\sort\BubbleSorter;
use app\sort\QuickSorter;

require __DIR__ . '/vendor/autoload.php';

$arr = [50, 2, 4, 1, 138, 1, 1, 5, 80, 0, 2, 1, 50, 2, 4, 1, 138, 1, 1, 5, 80, 0, 2, 1];
$sorter = new QuickSorter();
$sortedArray = $sorter->sort($arr);
$description = $sorter->tellAboutMyself();
print_r($sortedArray);
print_r($description . PHP_EOL);