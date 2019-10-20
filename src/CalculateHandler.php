<?php


namespace darthshell\cfs;


use DarthShelL\CalculateFromStringBundle\CalculateInterface;

class CalculateHandler implements CalculateInterface
{
    function calculate(string $input): int
    {
        return eval("return {$input};");
    }
}