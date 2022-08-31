<?php

spl_autoload_register(function ($classname) {
    $filename = __DIR__ . "/../src/" . $classname . ".php";
    if (file_exists($filename)) {
        include_once($filename);
        var_dump($filename);
    }
});

use PHPUnit\Framework\TestCase;

/**
 * @covers Calculator
 */
class CalculatorTest extends TestCase
{
    protected $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    public function testAdd()
    {
        self::assertEquals(5, $this->calculator->add(2, 3));
    }

    public function testMultiply()
    {
        self::assertEquals(6, $this->calculator->multiply(2, 3));

    }

    public function testDivide()
    {
        self::assertEquals(2, $this->calculator->divide(6, 3));

    }

    public function testSubtract()
    {
        self::assertEquals(4, $this->calculator->subtract(7, 3));

    }

}
