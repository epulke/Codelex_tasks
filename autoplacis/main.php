<?php

require_once "car.php";
require_once "shopitem.php";
require_once "Carshop.php";
require_once "Buyer.php";

$carShop = new CarShop([
    new ShopItem(
        new Car("Audi", 2005, "diesel"), 5000
    ),
    new ShopItem(
        new Car("Audi", 2010, "diesel"), 7000
    ),
    new ShopItem(
        new Car("BMW", 2012, "petrol"), 10000
    ),
    new ShopItem(
        new Car("BMW", 2005, "diesel"), 6000
    ),
]);

$carShop->displayCars();

$john = new Buyer("John", 9000);

$john->setCarPurchased($carShop);

$john->payThePrice();

$carShop->setCashBox($john);
$carShop->removePurchasedCar($john);

echo "Thank you for your purchase!" . PHP_EOL;
