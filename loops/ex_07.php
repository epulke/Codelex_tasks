<?php

while (true) {
    $desiredSum = (int)readline("Desired sum (2-12): ");
    if (in_array($desiredSum, range(2, 13))) {
        break;
    } else {
        echo "Invalid input!" . PHP_EOL;
    }
}

$actualSum = 0;
while ($actualSum !== $desiredSum) {
    $diceOne = rand(1, 6);
    $diceTwo = rand(1, 6);
    $actualSum = $diceOne + $diceTwo;
    echo "{$diceOne} and {$diceTwo} = {$actualSum}" . PHP_EOL;
}


