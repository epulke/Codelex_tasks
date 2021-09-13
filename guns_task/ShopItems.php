<?php

class ShopItems
{
    private Weapon $weapon;
    private int $price;
    private int $quantity;

    public function __construct(Weapon $weapon, int $price, int $quantity)
    {
        $this->weapon = $weapon;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getWeapon(): Weapon
    {
        return $this->weapon;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function removeWeapon(Weapon $weapon): void
    {
        if ($this->weapon === $weapon) $this->quantity--;
    }
}