<?php

namespace app\sort;

class QuickSorter implements Sorter
{
    private int $countIterations = 0;
    private string $name = "Быстрая сортировка";

    /**
     * @inheritDoc
     */
    public function sort(array $array): array
    {
        $lengthArray = count($array);
        if ($lengthArray < 2) {
            $this->countIterations++; // подсчет итераций, функциональной нагрузки не несет
            return $array;
        } else {
            $less = [];
            $greater = [];
            $pivot = $array[0];
            for ($i = 1; $i < $lengthArray; ++$i) {
                if ($array[$i] < $pivot) {
                    $less[] = $array[$i];
                } else {
                    $greater[] = $array[$i];
                }
                $this->countIterations++; // подсчет итераций, функциональной нагрузки не несет
            }
            return array_merge($this->sort($less), [$pivot], $this->sort($greater));
        }
    }

    /**
     * @inheritDoc
     */
    public function tellAboutMyself(): string
    {
        $text = "$this->name для указанного массива совершает $this->countIterations итераций.";
        return $text;
    }
}