<?php

require_once "product_task/Product.php";
require_once "product_task/ProductList.php";
require_once "product_task/Display.php";

$list = new ProductList();
$view = new Display($list);

while (true) {
    $view->displayChoice();
    $view->checkChoice();
}




