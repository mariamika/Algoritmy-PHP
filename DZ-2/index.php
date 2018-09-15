<?php

/**
 * Реализация алгоритма слияния
 */
    $arr = [5,1,9,7,10,13,4,6,2,3,8,12,11];

    function mergeSort($arr)
    {
        if(count($arr) <= 1)
        {
            return $arr;
        }
        else
        {
            $q = (int) (count($arr)/2);
            return myMerge(mergeSort(array_slice($arr, 0, $q)), mergeSort(array_slice($arr, $q)));
        }
    }

    function myMerge($leftArr, $rightArr)
    {

        $count = count($leftArr)+count($rightArr);

        $leftArr[] = INF;
        $rightArr[] = INF;

        $l = 0;
        $r = 0;

        for($i=0; $i<$count; $i++)
        {
            if($leftArr[$l] <= $rightArr[$r])
            {
                $arr[] = $leftArr[$l];
                $l++;
            }
            else
            {
                $arr[] = $rightArr[$r];
                $r++;
            }
        }

        return $arr;
    }

    var_dump(mergeSort($arr));


    /*
    Сортировка слиянием построена на принципе "разделяй и властвуй".
    Это Линеарифметический алгоритм, О(n*log(n))/ Работает довольно быстро, но требует много памяти.


    Сама я рассчитать сложность алгоритмов так и не смогла, математика что-то совсем подзабылась...
    Почитала много статей в интернете о вычислениях сложности алгоритмов. В целом суть мне ясна.

    */