<?php

class ShopItem
{
    private Car $car;
    private int $price;

    public function __construct(Car $car, $price)
    {
        $this->car = $car;
        $this->price = $price;
    }

    public function getCar(): Car
    {
        return $this->car;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}
