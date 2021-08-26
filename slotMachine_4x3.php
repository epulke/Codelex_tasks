<?php

$slotSymbols = ["A", "B", "C", "D", "A", "A", "A", "A"];
$winPrice = [
    "A" => 5,
    "B" => 10,
    "C" => 15,
    "D" => 20
];
$gridRows = 3;
$gridColumns = 4;

$diagonalConditions = [
    [
        [0, 0], [1, 1], [2, 2], [2, 3]
    ],
    [
        [0, 0], [0, 1], [1, 2], [2, 3]
    ],
    [
        [0, 2], [1, 1], [2, 0], [0, 3]
    ],
    [
        [0, 3], [1, 2], [2, 1], [2, 0]
    ]
];

$playersWallet = 200;

$minimalBet = 10;
$bedStep = 2;
$maxCoefficient = 5;
$possibleBets[] = $minimalBet;

for ($i = 1; $i <= $maxCoefficient; $i++)
{
    $minimalBet = $minimalBet * $bedStep;
    $possibleBets[] = $minimalBet;
}

function ifLineWon(array $line): bool {
    if (count(array_flip($line)) === 1) {
        return true;
    }
    return false;
}

/*------------------------------------------*/

while (true) {
    echo "Your wallet: {$playersWallet} $." . PHP_EOL;
    echo "Possible bets: " . implode(" ", $possibleBets) . PHP_EOL;

    while (true) {
        $playersBet = readline("Enter your bet: ");
        if (!in_array($playersBet, $possibleBets)) {
            echo "Invalid input!" . PHP_EOL;
        } elseif ($playersBet > $playersWallet) {
            echo "You do not have enough money for this bet!" . PHP_EOL;
        } else {
            $playersWallet = $playersWallet - $playersBet;
            break;
        }
    }

    $betCoefficient = array_search($playersBet, $possibleBets) + 1;

    // display slot machine
    $display = [];
    for ($i = 1; $i <= $gridRows; $i++)
    {
        $slotMachineRows = [];
        for ($j = 1; $j <= $gridColumns; $j++)
        {
            $slotMachineRows[] = $slotSymbols[array_rand($slotSymbols)];
        }
        $display[] = $slotMachineRows;
    }

    foreach ($display as $row)
    {
        foreach ($row as $slot)
        {
            echo $slot . " ";
        }
        echo PHP_EOL;
    }

    $amountWon = 0;

    // row win combinations checked
    for ($i = 0; $i < $gridRows; $i++) {
        if (ifLineWon($display[$i])) {
            $amountWon += $winPrice[$display[$i][0]] * $betCoefficient;
        }
    }

    // diagonal win combinations checked
    foreach ($diagonalConditions as $condition)
    {
        $line = [];
        $row = 0;
        $column = 0;
        foreach ($condition as $position)
        {
            $row = $position[0];
            $column = $position[1];
            $line[] = $display[$row][$column];
        }
        if (ifLineWon($line)) {
            $amountWon += $winPrice[$display[$row][$column]] * $betCoefficient;
        }
    }

    if ($amountWon > 0) {
        echo "You won {$amountWon} $!" . PHP_EOL;
        $playersWallet += $amountWon;
    } else {
        echo "You lost!" . PHP_EOL;
    }

    while (true) {
        $playAgain = readline("Do you want to play again (y/n)? ");
        $playAgainOptions = ["y", "n"];
        if (!in_array($playAgain, $playAgainOptions)) {
            echo "Invalid input!" . PHP_EOL;
        } elseif ($playAgain === "n") {
            echo "Your wallet: {$playersWallet} $." . PHP_EOL;
            exit;
        } else {
            break;
        }
    }
}