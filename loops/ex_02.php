<?php

//todo complete loop to multiply i with itself n times, it is NOT allowed to use built-in pow() function

$n = (int) readline("Input number of times: ");
$i = (int) readline("Input number to multiply with itself: ");
$result = $i;

for ($y = 2; $y <= $n; $y++) {
    $result *= $i;
}

echo $result;
