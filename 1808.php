<?php
abstract class Vehicles
{
    protected string $model;
    protected float $purchasePrice;
    protected string $purchaseYear;
    protected float $sellPrice;
    protected float $profit;

    public function __construct(string $m, float $pp, string $py)
    {
        $this->model = $m;
        $this->purchasePrice = $pp;
        $this->purchaseYear = $py;
    }

    public function sellNow(mixed $sp)
    {
        $this->sellPrice = $sp;
        return $this->profit = ($this->sellPrice - $this->purchasePrice);
    }

    abstract function profitOrLoss(): string;
}

class Car extends Vehicles
{
    public function profitOrLoss(): string
    {
        if ($this->profit > 0) {
            return "Profit of $this->profit with $this->model";
        } else {
            return "Loss of $this->profit with $this->model :(";
        }
    }
}

class TwoWheeler extends Vehicles
{
    public function profitOrLoss(): string
    {
        if ($this->profit > 0) {
            return "Profit of $this->profit with $this->model";
        } else {
            return "Loss of $this->profit with $this->model";
        }
    }
}

echo "<pre>";
$car = new Car("TUV", 778000, 2023);
// var_dump($car);

$car->sellNow(800000);
echo $car->profitOrLoss(), "<br>";

$bike = new TwoWheeler("RE", 275000, 2023);
$bike->sellNow(225000);
echo $bike->profitOrLoss(), "<br>";

$moped = new TwoWheeler("Jupiter", 124000, 2022);
$moped->sellNow(61000);
echo $moped->profitOrLoss();
