<?php


namespace DarthShelL\CalculateFromStringBundle;


use DarthShelL\CalculateFromStringBundle\CalculateInterface;

class CalculateHandler implements CalculateInterface
{
    function calculate(string $input): int
    {
        return eval("return {$input};");
    }
}