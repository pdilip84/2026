<?php

declare(strict_types=1);
require_once __DIR__ . "/Vehicle.php";
class Car extends \Vehicle
{
    public function vType()
    {
        return "Car is a Desiel vehicle";
    }
}
