<?php


class ProductList
{
    private array $productList;

    public function __construct()
    {
        $csv = array_map('str_getcsv', file('product_task/products.csv'));

        foreach ($csv as $item)
        {
            $this->addToList(new Product($item[0], $item[1], $item[2]));
        }
    }

    public function addToList(Product $item): void
    {
        $this->productList[] = $item;
        $this->saveList();
    }

    public function getProductList(): array
    {
        return $this->productList;
    }

    public function saveList(): void
    {
        $fp = fopen('product_task/products.csv', 'w');

        foreach ($this->productList as $product)
        {
            /** @var Product $product */
            fputcsv($fp,[
                $product->getName(),
                $product->getQuantity(),
                $product->getPrice()
            ]);
        }
        fclose($fp);
    }

    public function displayList(): void
    {
        foreach ($this->productList as $product)
        {
            /** @var Product $product */
            echo "{$product->getName()} | {$product->getQuantity()} | {$product->getPrice()}" . PHP_EOL;
        }
    }
}