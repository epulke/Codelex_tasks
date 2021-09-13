<?php declare(strict_types=1);

class Weapon
{
    protected string $name;
    protected string $license;
    protected int $bulletSpeed;

    public function __construct(string $name, string $license, int $bulletSpeed)
    {
        $this->name = $name;
        $this->license = $license;
        $this->bulletSpeed = $bulletSpeed;
    }

    public function setTrajectory(): int
    {
        return $this->bulletSpeed * 5 / 4;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLicense(): string
    {
        return $this->license;
    }

    public function getBulletSpeed(): int
    {
        return $this->bulletSpeed;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}