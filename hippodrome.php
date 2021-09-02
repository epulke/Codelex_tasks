<?php

$numberOfHorses = 5;
$wallet = 100;

$horseNames = range("A", "E");
$winnCoefficient = [
    "A" => rand(1, 5),
    "B" => rand(1, 5),
    "C" => rand(1, 5),
    "D" => rand(1, 5),
    "E" => rand(1, 5)
];

$fieldLength = 15;

$stadium = [];

echo "Today are running these horses: " . PHP_EOL;
for ($i = 0; $i < $numberOfHorses; $i++) {
    $number = $i + 1;
    echo "$number. horse '$horseNames[$i]' - coefficient {$winnCoefficient[$horseNames[$i]]}." . PHP_EOL;
}
echo "You have EUR $wallet to place your bet." .PHP_EOL;

/*--------------------------------------------------------------*/

$betsSet = [];
$horseBetName = [];

$again = "y";
while (true) {
    if ($again === "y") {
        $bet = (int) readline("Place your bet (10, 20, 30, 40, 50): ");
        if ($wallet < $bet) {
            echo "You have only $wallet! Your bet is set to $wallet." . PHP_EOL;
            $bet = $wallet;
        }
        $wallet -= $bet;
        $horseBet = strtoupper(readline("Which horse (A, B, C, D, E): "));
        $betsSet[$horseBet] = $bet;
        if ($wallet === 0) {
            break;
        }
        $again = readline("Do you want to bet again? (y/n): ");
    } else {
        break;
    }
}

// generate stadium - nested array
for ($j = 1; $j <= $numberOfHorses; $j++) {
    $horseLines = [];
    for ($i = 1; $i <= $fieldLength; $i++) {
        $horseLines[] = "_";
    }
    $stadium[] = $horseLines;
}

// put horses into the stadium
for ($i = 0; $i < $numberOfHorses; $i++) {
    $stadium[$i][0] = $horseNames[$i];
}

system("clear");
// display stadium with horses
foreach ($stadium as $horseLine) {
    echo implode(" ", $horseLine);
    echo PHP_EOL;
}

$step = 0;
$winner = [];

// make horses run until all reach finish line
while (count($winner) < $numberOfHorses) {
    sleep(1);
    system("clear");
    for ($i = 0; $i < $numberOfHorses; $i++) {
        $step = rand(1, 2);

        if ($stadium[$i][$fieldLength-1] !== "_") {
            if (!in_array($stadium[$i][$fieldLength-1], $winner)) {
                $winner[] = $stadium[$i][$fieldLength-1];
            }
            continue;
        } elseif ($stadium[$i][$fieldLength-2] !== "_") {
            $step = 1;
        }

        array_splice($stadium[$i], -$step);
        array_unshift($stadium[$i], ...array_fill(0, $step, "_"));
    }
    foreach ($stadium as $horseLine) {
        echo implode(" ", $horseLine);
        echo PHP_EOL;
    }
}

echo "Results: " . PHP_EOL;
for ($i = 1; $i <= $numberOfHorses; $i++) {
    echo $i . ". " . $winner[$i - 1] . PHP_EOL;
}

$moneyWon = 0;
foreach ($betsSet as $key => $bet) {
    if ($winner[0] === $key) {
        $moneyWon = $winnCoefficient[$winner[0]] * $bet;
    }
}

if ($moneyWon > 0) {
    echo "You have won $moneyWon!" . PHP_EOL;
} else {
    echo "You lost!";
}
