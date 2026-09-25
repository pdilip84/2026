<?php

declare(strict_types=1);

namespace App\dilip;

abstract class Vehicle
{
    abstract function Sound();

    final function madein()
    {
        return "Made in China";
    }
}
