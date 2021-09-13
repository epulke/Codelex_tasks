<?php declare(strict_types=1);

class MachineGun extends Weapon
{
    public function setTrajectory(): int
    {
        return $this->bulletSpeed * 2 / 3;
    }
}