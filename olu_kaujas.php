<?php

$numberOfEggs = 5;
$eggTypes = [ "regular", "wooden", "metal"];
$chanceToWin =
    [
        "regular" => 50,
        "wooden" => 70,
        "metal" => 90
    ];

// if file exists open from file
if (file_exists("Olas.txt")) {
    $myFile = fopen("Olas.txt", "r");
    $array = explode("!",fgets($myFile));
    fclose($myFile);
    $previousPlayerBasket = explode(",", $array[0]);
    $previousComputerBasket = explode(",", $array[1]);
} else {
    $previousPlayerBasket = [];
    $previousComputerBasket = [];
}

function generateBasket(array $previousBasket, int $numberOfEggs, array $eggTypes): array {
    $basket = [];
    $length = 0;
    if (count($previousBasket) > 0 && strlen($previousBasket[0]) > 0) {
        $length = count($previousBasket);
        if ($length > 5) {
            $length = 5;
        }
        array_splice($basket, 0, $length, $previousBasket);
    }
    for ($i = 1; $i <= $numberOfEggs - $length; $i++) {
        $basket[] = $eggTypes[array_rand($eggTypes)];
    }
    return $basket;
}

// generate computer's egg basket  - use previously saved basket and add eggs so that there are 5
$computerBasket = generateBasket($previousComputerBasket, $numberOfEggs, $eggTypes);
$computerEggs = $numberOfEggs;

//generate player's egg basket - use previously saved basket and add eggs so that there are 5
$playersBasket = generateBasket($previousPlayerBasket, $numberOfEggs, $eggTypes);
$playersEggs = $numberOfEggs;

function computerWinText(int $winnOrNot): string {
    if ($winnOrNot === 1) {
        return "Computer won, Player lost!";
    } else {
        return "Computer lost, Player won!";
    }
}

function winCounter(int $probability1, int $probability2): int {
    $number = rand(1, $probability1 + $probability2);
    if ($number <= $probability1) {
        return 1;
    } else {
        return 0;
    }
}

/*----------------------------------------------------------------------*/

echo "Welcome to egg fight!" . PHP_EOL;
echo "You play vs computer." . PHP_EOL;
echo "Each of you has $numberOfEggs eggs." . PHP_EOL;

$play = readline("Do you want to play? (y/n) ");

if ($play === "n") {
    echo "Bye!";
    exit;
}

$round = 1;

while (true) {
    echo "Round $round" . PHP_EOL;
    echo "Computer's $computerBasket[0] egg vs Player's $playersBasket[0] egg." . PHP_EOL;
    $computerTurn1 = winCounter($chanceToWin[$computerBasket[0]], $chanceToWin[$playersBasket[0]]);
    $computerTurn2 = winCounter($chanceToWin[$computerBasket[0]], $chanceToWin[$playersBasket[0]]);
    $computerTurn = $computerTurn1 + $computerTurn2;
    echo "Side 1: " . computerWinText($computerTurn1) . PHP_EOL;
    echo "Side 2: " . computerWinText($computerTurn2) . PHP_EOL;

    if ($computerTurn === 1) {
        array_shift($computerBasket);
        array_shift($playersBasket);
        $computerEggs = count($computerBasket);
        $playersEggs = count($playersBasket);
        echo "It's a tie!" . PHP_EOL;
        echo "Computer has $computerEggs eggs, Player has $playersEggs eggs." . PHP_EOL;
    } elseif ($computerTurn === 2) {
        $computerBasket[] = array_shift($playersBasket);
        $computerEggs = count($computerBasket);
        $playersEggs = count($playersBasket);
        echo "Computer wins! Computer gets your egg." . PHP_EOL;
        echo "Computer has $computerEggs eggs, Player has $playersEggs eggs." . PHP_EOL;
    } else {
        $playersBasket[] = array_shift($computerBasket);
        $computerEggs = count($computerBasket);
        $playersEggs = count($playersBasket);
        echo "Player wins! Player gets computer's egg." . PHP_EOL;
        echo "Computer has $computerEggs eggs, Player has $playersEggs eggs." . PHP_EOL;
    }

    if ($computerEggs === 0) {
        echo "Game won by Player!";
        break;
    } elseif ($playersEggs === 0) {
        echo "Game won by Computer!";
        break;
    }

    $round += 1;
}

$myFile = fopen("Olas.txt", "w");
fwrite($myFile, implode(",",$playersBasket));
fwrite($myFile, "!");
fwrite($myFile, implode(",",$computerBasket));
fclose($myFile);

