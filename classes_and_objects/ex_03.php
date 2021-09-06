<?php

class FuelGauge {
    private int $fuelLiters;

    public function __construct(int $fuelLiters)
    {
        $this->fuelLiters = $fuelLiters;
    }

    public function getFuel(): int
    {
        return $this->fuelLiters;
    }

    public function reportFuel(): string
    {
        return "Car's fuel is {$this->getFuel()} liters." . PHP_EOL;
    }

    public function fillTank(): void
    {
        if ($this->fuelLiters < 70) $this->fuelLiters++;
    }

    public function burnFuel(): void
    {
        if ($this->fuelLiters > 0) $this->fuelLiters--;
    }
}

class Odometer {
    private int $mileage;
    private FuelGauge $fuelLiters;

    public function __construct(int $mileage, FuelGauge $fuelLiters)
    {
        $this->mileage = $mileage;
        $this->fuelLiters = $fuelLiters;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function reportMileage(): string
    {
        return "Car's current mileage is {$this->getMileage()} km." . PHP_EOL;
    }

    public function increaseMileage(): void
    {
        ($this->mileage >= 999999) ? $this->mileage = 0 : $this->mileage++;
    }

    public function decreaseTankMileage(): void
    {
        for ($i = 1; $i <= 10; $i++ ) {
            $this->increaseMileage();
        }
        $this->fuelLiters->burnFuel();
    }
}

//creating new instance for each object
$tank = new FuelGauge(60);
$car = new Odometer(999500, $tank);
echo $tank->reportFuel();
echo $car->reportMileage();
echo "-----------" . PHP_EOL;

// filling the tank to maximum
echo "Filling full tank." . PHP_EOL;
while ($tank->getFuel() < 70) {
    $tank->fillTank();
}
echo $tank->reportFuel();
echo "-----------" . PHP_EOL;

// driving the car
echo "Driving the car!" . PHP_EOL;
while ($tank->getFuel() > 0) {
    $car->decreaseTankMileage();
    echo $tank->reportFuel();
    echo $car->reportMileage();
    echo "-------" . PHP_EOL;
}
