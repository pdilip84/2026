<?php

declare(strict_types=1);

namespace App\dilip;

class Car extends Vehicle
{
    public function sound()
    {
        return 'wromm.. wromm..';
    }

    // Can not override with final keyword function
    // public function madein()
    // {
    //     return "Made in India";
    // }
}
