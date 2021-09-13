<?php declare(strict_types=1);

class ShotGun extends Weapon
{
    public function setTrajectory(): int
    {
        return $this->bulletSpeed * 2 / 4;
    }
}