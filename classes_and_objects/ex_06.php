<?php


//function calculate_energy_drinkers(int $numberSurveyed)
//{
//    throw new LogicException(";(");
//}
//
//function calculate_prefer_citrus(int $numberSurveyed)
//{
//    throw new LogicException(";(");
//}
//
///*
//fixme
//echo "Total number of people surveyed " . $surveyed;
//echo "Approximately " . ? . " bought at least one energy drink";
//echo ? . " of those " . "prefer citrus flavored energy drinks.";
//*/

$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;


class Survey {
    private int $surveyed;
    private float $purchased_energy_drinks;
    private float $prefer_citrus_drinks;

    public function __construct(int $surveyed, float $purchased_energy_drinks, float $prefer_citrus_drinks)
    {
        $this->surveyed = $surveyed;
        $this->purchased_energy_drinks = $purchased_energy_drinks;
        $this->prefer_citrus_drinks = $prefer_citrus_drinks;
    }

    public function getSurveyed(): int
    {
        return $this->surveyed;
    }

    public function calculateEnergyDrinkers(): int
    {
        return floor($this->getSurveyed() * $this->purchased_energy_drinks);
    }

    public function calculatePreferCitrus(): int
    {
        return floor($this->calculateEnergyDrinkers() * $this->prefer_citrus_drinks);

    }
}

$energySurvey = new Survey($surveyed, $purchased_energy_drinks, $prefer_citrus_drinks);

echo "Total number of people surveyed " . $energySurvey->getSurveyed() . PHP_EOL;
echo "Approximately " . $energySurvey->calculateEnergyDrinkers() . " bought at least one energy drink" . PHP_EOL;
echo $energySurvey->calculatePreferCitrus() . " of those " . "prefer citrus flavored energy drinks.";