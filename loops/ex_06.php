<?php

function drawPyramid(int $n): string {
    $pyramid = "";
    for ($j = ($n - 1) * 4; $j >= 0; $j=$j-4)
    {
        $pyramid .= str_repeat("/", $j);
        $pyramid .= str_repeat("*", ($n - 1) * 4 - $j);
        $pyramid .= str_repeat("*", ($n - 1) * 4 - $j);
        $pyramid .= str_repeat("\\", $j);
        $pyramid .= PHP_EOL;
    }
    return $pyramid;
}


echo drawPyramid(3);
echo drawPyramid(5);
echo drawPyramid(7);