<?php
function basesComparison($sec1, $sec2)
{
    $secArray1 = str_split(str_replace(' ', '', $sec1));
    $secArray2 = str_split(str_replace(' ', '', $sec2));
    sort($secArray1 );
    sort($secArray2 );
    return $secArray1 == $secArray2 ? true : false;
}
$sec1 = 'A A T C T G C C A G';
$sec2 = 'G T G A A C C C T A';
echo (basesComparison($sec1, $sec2)) ? 'Bases iguales' : 'Bases diferentes';