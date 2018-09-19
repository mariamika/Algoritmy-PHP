<?php

/**
 * Палиндром
 */

function palindrom_($str)
{
    $arr_str = str_split($str,1);
    $q = (int) (count($arr_str)/2);
    $leftArr = array_slice($arr_str, 0, $q);
    $rightArr = array_slice($arr_str, $q);
    $l = 0;
    $r = count($rightArr)-1;

    for($i=0; $i<count($leftArr); $i++)
    {
        if($leftArr[$l] == $rightArr[$r])
        {$l++; $r--;}
        else
        {echo "Строка не является палиндромом! <br>"; exit;}
    }
    return "Строка является палиндромом! Ура) <br>";
}

echo 'mutatum<br>';
print_r(palindrom_('mutatum'));
echo 'deified<br>';
print_r(palindrom_('deified'));
echo 'maria<br>';
print_r(palindrom_('maria'));