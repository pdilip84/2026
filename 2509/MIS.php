<?php

namespace App\demointerface;

use Override;

require_once __DIR__ . "/SchollMethods.php";
require_once __DIR__ . "/StudentMethods.php";

class MIS implements SchollMethods, StudentMethods
{
    #[Override]
    public function schoolType(): string
    {
        return "Internation School";
    }
    #[Override]
    public function establishYear(): int
    {
        return 2020;
    }
    #[Override]
    public function city(): string
    {
        return 'Ahmedabad';
    }
    #[Override]
    public function studentAvgAge(): int
    {
        return 12;
    }
    #[Override]
    public function studentRating(): float
    {
        return 4.5;
    }
    #[Override]
    public function studentTotal(): int
    {
        return 1200;
    }
}
