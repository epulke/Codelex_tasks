<?php

function addItem(string $name, int $price): stdClass {
    $coffee = new stdClass();
    $coffee->name = $name;
    $coffee->price = $price;
    return $coffee;
}

$coffeeList = [
    addItem("Black Coffee", 110),
    addItem("White Coffee", 190),
    addItem("Cappuccino", 230),
    addItem("Late", 280),
    addItem("Black tea", 150)
];

$availableMachineCoins = [200, 100, 50, 20, 10, 5, 2, 1];

$customer = new stdClass();
$customer->wallet = [
    "1" => 5,
    "2" => 5,
    "5" => 5,
    "10" => 5,
    "20" => 5,
    "50" => 5,
    "100" => 5,
    "200" => 5,
];

echo "Coffee Machine: " . PHP_EOL;
foreach ($coffeeList as $key => $coffee) {
    $number = $key + 1;
    $price = number_format($coffee->price/100, 2);
    $dots = str_repeat(".", 20 - strlen($coffee->name));
    echo "$number. $coffee->name $dots $price" . PHP_EOL;
}

$choice = (int) readline("Enter coffee number: ");
// input validation
$validChoice = range(1, 5);
while (true) {
    if (!in_array($choice, $validChoice)) {
        echo "Invalid input!" . PHP_EOL;
        $choice = (int) readline("Enter coffee number: ");
    } else {
        break;
    }
}

$wallet = 0;
$coins = 0;
$selectedCoffee = $choice - 1;
$change = $wallet - $coffeeList[$selectedCoffee]->price;
$coinsNeeded = number_format(($coffeeList[$selectedCoffee]->price - $wallet)/100, 2);
echo "You need $coinsNeeded." . PHP_EOL;

while ($coinsNeeded > 0) {
    $coins = (int) readline("Insert coins: ");
    if (!array_key_exists($coins, $customer->wallet)) {
        echo "Invalid input!" . PHP_EOL;
        continue;
    }

    if ($customer->wallet[$coins] === 0) {
        echo "You do not have this coin!" . PHP_EOL;
        continue;
    }
    $wallet += $coins;
    $customer->wallet[$coins] -= 1;
    $coinsNeeded = number_format(($coffeeList[$selectedCoffee]->price - $wallet)/100, 2);
    if ($coinsNeeded > 0) {
        echo "You need $coinsNeeded." . PHP_EOL;
    }

}


$selectedCoffee = $choice - 1;
$change = $wallet - $coffeeList[$selectedCoffee]->price;
// prepare change in coins
$changeCoins = [];
foreach ($availableMachineCoins as $coin) {
    $num = intdiv($change, $coin);
    if ($change > 0) {
        for ($i = 1; $i <= $num; $i++) {
            $changeCoins[] = $coin;
        }
        $change -= $coin * $num;
        $customer->wallet[$coin] += 1 * $num;
    }
}

echo "Preparing {$coffeeList[$selectedCoffee]->name}..." . PHP_EOL;
sleep(2);
echo "Thank you for using our service!" . PHP_EOL;
if (count($changeCoins) > 0) {
    echo "Don't forget to take your change: " . implode(" ", $changeCoins);
}
