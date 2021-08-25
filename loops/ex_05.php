<?php

//$dice = range (1, 6);

echo "Welcome to Piglet!" . PHP_EOL;

$rolledNumber = 0;
$totalPoints = 0;

while ($rolledNumber !== 1) {
    $rolledNumber = rand(1, 6);
    echo "You rolled a {$rolledNumber}!" . PHP_EOL;
    $totalPoints += $rolledNumber;
    if ($rolledNumber === 1) {
        echo "You got 0 points!";
        exit;
    }
    while (true) {
        $playAgain = readline("Roll again? (y/n) ");
        if ($playAgain === "y") {
            break;
        } elseif ($playAgain === "n") {
            echo "You got {$totalPoints} points.";
            exit;
        } else {
            echo "Invalid input!" . PHP_EOL;
        }
    }
}

