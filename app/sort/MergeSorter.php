<?php

namespace app\sort;

class MergeSorter implements Sorter
{
    private int $countIterations = 0;
    private string $name = "Сортировка слиянием";

    /**
     * @inheritDoc
     */
    public function sort(array $array): array
    {
        $countArr = count($array);
        if ($countArr < 2) {
            $this->countIterations++; // подсчет итераций, функциональной нагрузки не несет
            return $array;
        } else {
            $centerArrKey = floor($countArr / 2);
            $centerElement = $array[$centerArrKey];
            $less = [];
            $greater = [];
            $arrSort = [];
            for ($i = 0; $i < $countArr; ++$i) {
                $this->countIterations++; // подсчет итераций, функциональной нагрузки не несет
                if ($i == $centerArrKey) {
                    continue;
                }
                if ($array[$i] < $centerElement) {
                    $less[] = $array[$i];
                } else {
                    $greater[] = $array[$i];
                }
            }
            $arrLess = $this->sort($less);
            $arrGrater = $this->sort($greater);
            foreach ($arrLess as $value) {
                $this->countIterations++; // подсчет итераций, функциональной нагрузки не несет
                $arrSort[] = $value;
            }
            $arrSort[] = $centerElement;
            foreach ($arrGrater as $value) {
                $this->countIterations++; // подсчет итераций, функциональной нагрузки не несет
                $arrSort[] = $value;
            }
            return $arrSort;
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