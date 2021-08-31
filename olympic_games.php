<?php

$numberOfPlayers = (int) readline("Enter number of runners (2 - 25): ");

$playerSymbols = range("A", "Z");

$fieldLength = 10;

$stadium = [];

/*--------------------------------------------------------------*/

for ($j = 1; $j <= $numberOfPlayers; $j++) {
    $runnerLines = [];
    for ($i = 1; $i <= $fieldLength; $i++) {
        $runnerLines[] = "_";
    }
    $stadium[] = $runnerLines;
}

for ($i = 0; $i < $numberOfPlayers; $i++) {
    $stadium[$i][0] = $playerSymbols[$i];
}

foreach ($stadium as $runnerLine) {
    foreach ($runnerLine as $length) {
        echo $length . " ";
    }
    echo PHP_EOL;
}

$step = 0;
$winner = [];

while (count($winner) < $numberOfPlayers) {
    sleep(1);
    system("clear");
    for ($i = 0; $i < $numberOfPlayers; $i++) {
        $step = rand(1, 2);


        if ($stadium[$i][$fieldLength-1] !== "_") {
            if (!in_array($stadium[$i][$fieldLength-1], $winner)) {
                $winner[] = $stadium[$i][$fieldLength-1];
            }
            continue;
        } elseif ($stadium[$i][$fieldLength-2] !== "_") {
            $step = 1;
        }

        if ($step === 1) {
            array_pop($stadium[$i]);
            array_unshift($stadium[$i], "_");
        } else {
            array_pop($stadium[$i]);
            array_pop($stadium[$i]);
            array_unshift($stadium[$i], "_" , "_");
        }
    }
    foreach ($stadium as $runnerLine) {
        foreach ($runnerLine as $length) {
            echo $length . " ";
        }
        echo PHP_EOL;
    }
}

echo "Results: " . PHP_EOL;
for ($i = 1; $i <= $numberOfPlayers; $i++) {
    echo $i . ". " . $winner[$i - 1] . PHP_EOL;
}
