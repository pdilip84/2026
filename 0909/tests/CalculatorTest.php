<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
// All test classes must extend PHPUnit's TestCase
{
    public function testBasicAddition()
    {
        $result = 2 + 2;

        // Assert that the result matches your expectation
        $this->assertEquals(4, $result);
    }
}
