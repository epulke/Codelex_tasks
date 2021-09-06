<?php

class Date {
    private int $month;
    private int $day;
    private int $year;

    public function __construct(int $month, int $day, int $year)
    {
        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }

    public function setMonth(int $newMonth): void
    {
        $this->month = $newMonth;
    }

    public function setDay(int $newDay): void
    {
        $this->day = $newDay;
    }

    public function setYear(int $newYear): void
    {
        $this->year = $newYear;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function displayDate(): string
    {
        return "{$this->getMonth()}/{$this->getDay()}/{$this->getYear()}";
    }
}

$today = new Date(8,27,2021);
echo $today->displayDate() . PHP_EOL;
$today->setMonth(1);
echo $today->getMonth() . PHP_EOL;
$today->setDay(1);
echo $today->getDay() . PHP_EOL;
$today->setYear(2000);
echo $today->getYear() . PHP_EOL;
echo $today->displayDate() . PHP_EOL;