<?php

declare(strict_types=1);

namespace TestDemonstration\Phpunit;

class School
{
    public string $schoolName;
    public float $schoolArea;

    public function __construct(string $name, float $area = 1)
    {
        $this->schoolName = $name;
        $this->schoolArea = $area;
    }
    public function schoolType(): string
    {
        return $this->schoolArea == 0 ? "Average" : "Premium";
    }
    public function getSchoolName(): string
    {
        return $this->schoolName;
    }
}
