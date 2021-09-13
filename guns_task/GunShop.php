<?php declare(strict_types=1);

class GunShop
{
    protected array $list;

    public function __construct(array $list)
    {
        foreach ($list as $item)
        {
            $this->addWeapon($item);
        }
    }

    private function addWeapon(ShopItems $weapon): void
    {
        $this->list[] = $weapon;
    }

    public function getList(): array
    {
        return $this->list;
    }

}

