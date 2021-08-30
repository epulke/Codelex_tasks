<?php

function addItemsToShop(string $name, float $price, int $amount): stdClass
{
    $product = new stdClass();
    $product->name = $name;
    $product->price = $price;
    $product->amount = $amount;
    return $product;
}

$itemsSold = [
    addItemsToShop("Snickers", 1.50, 10),
    addItemsToShop("Mars", 1.45, 11),
    addItemsToShop("Bounty", 1.40, 9),
    addItemsToShop("Coca-Cola", 1.25, 15),
    addItemsToShop("Sprite", 1.20, 12),
    addItemsToShop("Fanta", 1.25, 5)
];

$cart = [];

function searchItemInList($purchase, $itemList)
{
    foreach ($itemList as $item) {
        if (strtolower($item->name) === $purchase)
        {
            return $item;
        }
    }
    return false;
}

function checkQuantity($quantity, $item)
{
    if ($quantity <= $item->amount)
    {
        $item->amount -= $quantity;
        return true;
    }
    return false;
}

echo "Welcome to Narvesen!" . PHP_EOL;

echo "Here is what we have: " . PHP_EOL;

$shopping = true;
while ($shopping === true) {
    foreach ($itemsSold as $item) {
        echo $item->name . " for EUR " . $item->price . PHP_EOL;
    }

    $purchase = strtolower(readline("What would you like to buy? "));

    if (searchItemInList($purchase, $itemsSold) === false) {
        echo "Invalid input!" . PHP_EOL;
        continue;
    } else {
        $selectedItem = searchItemInList($purchase, $itemsSold);
        $selectedItemClone = clone searchItemInList($purchase, $itemsSold);
        $cart[] = $selectedItemClone;
    }

    $quantity = 100000000;
    while (checkQuantity($quantity, $selectedItem) === false) {
        $quantity = (int) readline("Enter quantity: ");
        if (checkQuantity($quantity, $selectedItem) === true) {
            $selectedItemClone->amount = $quantity;
            break;
        }
        echo "We have only $selectedItem->amount items of $selectedItem->name." . PHP_EOL;
    }

    $purchaseAgain = readline("Do you want to purchase something else? (y/n) ");
    $validInput = ["y", "n"];
    while (!in_array($purchaseAgain, $validInput)){
        echo "Invalid input!";
        $purchaseAgain = readline("Do you want to purchase something else? (y/n) ");
    }

    switch ($purchaseAgain) {
        case "y":
            continue;
        case "n":
            $shopping = false;
    }
    var_dump($cart);
}

$total = 0;
echo "Your cart contains: " . PHP_EOL;
foreach ($cart as $item) {
    echo $item->name . " x " . $item->amount . " for EUR " . $item->price . PHP_EOL;
    $total += $item->amount * $item->price;
}
echo "Total: EUR " . $total .PHP_EOL;








