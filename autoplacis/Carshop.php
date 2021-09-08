<?php

class CarShop {
    private array $shop = [];
    private ?int $cashBox = 0;

    public function __construct(array $shop)
    {
        foreach ($shop as $item)
        {
            $this->addItem($item);
        }
    }

    public function addItem(ShopItem $car): void
    {
        $this->shop[] = $car;
    }

    public function getShop(): array
    {
        return $this->shop;
    }


    public function displayCars(): void
    {
        foreach ($this->getShop() as $key => $car) {
            $number = $key + 1;
            echo "$number. {$car->getCar()->getName()} ({$car->getCar()->getYear()}), {$car->getCar()->getEngine()}, price EUR {$car->getPrice()}." . PHP_EOL;
        }
    }

    public function getCarFromList($number): ShopItem
    {
        return $this->shop[$number - 1];
    }


    public function setCashBox(Buyer $buyer): void
    {
        $this->cashBox += $buyer->getCarPurchased()->getPrice();
    }

    public function removePurchasedCar(Buyer $buyer): void
    {
        $number = array_search($buyer->getCarPurchased(), $this->shop);
        var_dump($number);
        unset($this->shop[$number]);
    }
}