<?php
// Class, function & oops demonstration

class Car
{
    public string $model;
    private ?float $price = null;

    public function __construct()
    {
        // throw new \Exception('Not implemented');
    }
    public function setPrice(float $x)
    {
        return $this->price = $x;
    }
    public function getPrice(): float
    {
        return $this->price;
    }

    public function setModel(string $m)
    {
        return $this->model = $m;
    }
    public function getModel(): string
    {
        return $this->model;
    }
}

$carOne = new Car();
$carOne->setPrice(7.5);
$carOne->setModel('BYD');
var_dump($carOne);
