<?php

class Dog {
    private string $name;
    private string $sex;
    private ?string $mother = null;
    private ?string $father = null;

    public function __construct(string $name, string $sex)
    {
        $this->name = $name;
        $this->sex = $sex;
    }

    public function setFather(string $father): void
    {
        $this->father = $father;
    }

    public function setMother(string $mother): void
    {
        $this->mother = $mother;
    }

    public function getFather(): string
    {
        return ($this->father === null) ? "Unknown" : $this->father;
    }

    public function getMother(): string
    {
        return ($this->mother === null) ? "Unknown" : $this->mother;
    }

    public function hasSameMotherAs(Dog $otherDog): bool
    {
        if ($this->getMother() === "Unknown" || $otherDog->getMother() === "Unknown") return false;
        return $this->mother === $otherDog->mother;
    }
}

class DogTest extends Dog
{

}

$max = new DogTest("Max", "male");
$rocky = new DogTest("Rocky", "male");
$sparky = new DogTest("Sparky", "male");
$buster = new DogTest("Buster", "male");
$sam = new DogTest("Sam", "male");
$lady = new DogTest("Lady", "female");
$molly = new DogTest("Molly", "female");
$coco = new DogTest("Coco", "female");

$max->setMother("Lady");
$max->setFather("Rocky");
$coco->setMother("Molly");
$coco->setFather("Buster");
$rocky->setMother("Molly");
$rocky->setFather("Sam");
$buster->setMother("Lady");
$buster->setFather("Sparky");


echo $coco->getFather();
echo PHP_EOL;
echo $sparky->getFather();
echo PHP_EOL;
echo $coco->hasSameMotherAs($rocky);