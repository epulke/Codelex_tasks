<?php

require_once "product_task/Product.php";
require_once "product_task/ProductList.php";
require_once "product_task/Display.php";


$view = new Display(new ProductList());

$view->displayChoice();



