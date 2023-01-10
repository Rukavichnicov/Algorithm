<?php

namespace app\sort;

class BubbleSorter implements Sorter
{
    private int $countIterations = 0;
    private string $name = "Пузырьковая сортировка";

    /**
     * @inheritDoc
     */
    public function sort(array $array): array
    {
        $lengthArray = count($array);
        for ($count_arr = $lengthArray; $count_arr > 0; $count_arr--) {
            for ($i = 0; $i < $count_arr; $i++) {
                $j = $i + 1;
                if ($j === $count_arr) {
                    break;
                }
                if ($array[$i] > $array[$j]) {
                    $tmp_num_arr = $array[$j];
                    $array[$j] = $array[$i];
                    $array[$i] = $tmp_num_arr;
                    $this->countIterations++; // подсчет итераций, функциональной нагрузки не несет
                }
            }
        }
        return $array;
    }

    /**
     * @return string
     */
    public function tellAboutMyself(): string
    {
        $text = "$this->name для указанного массива совершает $this->countIterations итераций.";
        return $text;
    }
}