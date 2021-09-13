<?php

require_once "Weapon.php";
require_once "Shotgun.php";
require_once "Machinegun.php";
require_once "ShopItems.php";
require_once "GunShop.php";
require_once "Display.php";

$shop = new Display(new GunShop(
    [
        new ShopItems(new ShotGun("Shot Gun", "A", 120), 1200, 10),
        new ShopItems(new MachineGun("Machine gun", "B", 120), 2500, 9),
        new ShopItems(new ShotGun("Shot Gun 2", "B", 130), 1500, 5)
    ]
));


$shop->runShop();

