<?php

$availableChoices = ["rock", "paper", "scissors"];

$computerChoice = $availableChoices[array_rand($availableChoices)];

$playerChoice = strtolower(readline("Enter rock, paper or scissors: "));

while (!in_array($playerChoice, $availableChoices)) {
    if (!in_array($playerChoice, $availableChoices)) {
        echo "Invalid input!" . PHP_EOL;
    }
    $playerChoice = strtolower(readline("Enter rock, paper or scissors: "));
}

echo "Your {$playerChoice} vs Computer's {$computerChoice}." . PHP_EOL;

if ($computerChoice === "rock" && $playerChoice === "scissors" ||
    $computerChoice === "paper" && $playerChoice === "rock" ||
    $computerChoice === "scissors" && $playerChoice === "paper") {
    echo "Computer won!";
} elseif ($computerChoice === $playerChoice) {
    echo "It's a tie!";
} else {
    echo "You won!";
}