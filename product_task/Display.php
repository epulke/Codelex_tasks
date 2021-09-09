<?php

class Display
{
    private ?int $choice;
    private ProductList $displayedList;

    public function __construct(ProductList $productList)
    {
        $this->displayedList = $productList;
    }

    public function displayChoice(): void
    {
        echo "-------------------------" . PHP_EOL;
        echo "What do you want to do? " . PHP_EOL;
        echo "1 | View products" . PHP_EOL;
        echo "2 | Add new product" . PHP_EOL;
        echo "0 | Exit" . PHP_EOL;

        $this->choice = (int) readline("Enter number: ");

        echo "-------------------------" . PHP_EOL;
    }

    public function getChoice(): ?int
    {
        return $this->choice;
    }

    public function checkChoice(): void
    {
        SWITCH ($this->choice)
        {
            case 0:
                exit;
            case 1:
                $this->displayList();
                break;
            case 2:
                $name = readline("Enter name: ");
                $quantity = (int) readline("Enter quantity: ");
                $price = (int) readline("Enter price: ");
                $this->displayedList->addToList(new Product($name, $quantity, $price));
                break;
        }

    }

    public function displayList(): void
    {
        foreach ($this->displayedList->getProductList() as $item)
        {
            /** @var Product $item */
            echo "{$item->getName()} | {$item->getQuantity()} | {$item->getPrice()}" . PHP_EOL;
        }
    }

}