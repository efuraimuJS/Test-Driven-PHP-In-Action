<?php


class Calculator
{

    /**
     * @assert (2, 5) == 7
     */
    public function add(int $int, int $int1)
    {
        return $int + $int1;
    }

    public function multiply(int $int, int $int1)
    {
        return $int * $int1;

    }

    public function divide(int $int, int $int1)
    {
        return $int / $int1;

    }

    public function subtract(int $int, int $int1)
    {
        return $int - $int1;

    }
}