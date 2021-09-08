<?php

class Car
{
    private string $name;
    private int $year;
    private string $engine;

    public function __construct(string $name, int $year, string $engine)
    {
        $this->name = $name;
        $this->year = $year;
        $this->engine = $engine;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getEngine(): string
    {
        return $this->engine;
    }

}