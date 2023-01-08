<?php

namespace app\sort;

interface Sorter
{
    /**
     * @param array $array
     * @return array
     */
    public function sort(array $array): array;

    /**
     * @return string
     */
    public function tellAboutMyself(): string;
}