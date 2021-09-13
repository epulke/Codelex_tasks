<?php

class Display
{
    private GunShop $products;

    public function __construct(GunShop $products)
    {
        $this->products = $products;
    }

    public function runShop(): void
    {
        echo "Available products:" . PHP_EOL;
        foreach ($this->products->getlist() as $item)
        {
            /** @var ShopItems $item */
            echo "{$item->getWeapon()->getName()}, license {$item->getWeapon()->getLicense()}, "
            . "speed {$item->getWeapon()->getBulletSpeed()} m/s, trajectory {$item->getWeapon()->setTrajectory()} | "
            . "EUR {$item->getPrice()}." . PHP_EOL;
        }
        echo "---------------------------------------------" . PHP_EOL;
        $this->purchase();
    }

    public function purchase(): void
    {
        $choice = strtolower(readline("Enter product name to purchase: "));
        foreach($this->products->getlist() as $item)
        {
            /** @var ShopItems $item */
            if (strtolower($item->getWeapon()->getName()) === $choice)
            {
                $item->removeWeapon($item->getWeapon());
                echo "Thank you for your purchase!" . PHP_EOL;
            }
        }
    }
}