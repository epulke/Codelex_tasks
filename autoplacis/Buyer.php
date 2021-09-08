<?php

class Buyer {
    private string $name;
    private int $wallet;
    private ?ShopItem $carPurchased;

    public function __construct(string $name, int $wallet)
    {
        $this->name = $name;
        $this->wallet = $wallet;
    }

    public function setCarPurchased(CarShop $list): void
    {
        while (true) {
            $number = readline("Select car to buy by typing its number: ");
            if ($list->getCarFromList($number)->getPrice() <= $this->wallet) {
                $this->carPurchased = $list->getCarFromList($number);
                break;
            } else {
                echo "You do not have enough money!" . PHP_EOL;
            }
        }
    }

    public function getCarPurchased(): ?ShopItem
    {
        return $this->carPurchased;
    }

    public function payThePrice(): void
    {
        $this->wallet -= $this->carPurchased->getPrice();
    }
}