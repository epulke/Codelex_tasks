<?php

class Product{
    public string $name;
    public float $startPrice;
    public int $amount;

    public function __construct(string $name, float $startPrice, int $amount)
    {
        $this->name = $name;
        $this->startPrice = $startPrice;
        $this->amount = $amount;
    }

    public function printProduct(): string
    {
        return "$this->name, price $this->startPrice, amount $this->amount." . PHP_EOL;
    }

    public function changeQuantity(int $quantityNew): void
    {
        $this->amount = $quantityNew;
    }

    public function changePrice(float $priceNew): void
    {
        $this->startPrice = $priceNew;
    }
}

$mouse = new Product("Logitech mouse", 70.00, 14);
$iphone = new Product("IPhone 5s", 999.99, 3);
$epson = new Product("Epson EB-U05", 440.46, 1);

echo $mouse->printProduct();
echo $iphone->printProduct();
echo $epson->printProduct();

$mouse->changeQuantity(20);
echo $mouse->printProduct();

$iphone->changePrice(1200.99);
echo $iphone->printProduct();
