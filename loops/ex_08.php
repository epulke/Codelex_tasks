<?php

$minNumber = readline("Min? ");
$maxNumber = readline("Max? ");

$numberArray = range($minNumber, $maxNumber);

for ($i = $minNumber; $i <= $maxNumber; $i++)
{
    foreach ($numberArray as $number) {
        echo $number;
    }
    echo PHP_EOL;
    $moveNumber = $numberArray[0];
    array_shift($numberArray);
    $numberArray[] = $moveNumber;
}