<?php


namespace darthshell\cfs;


use darthshell\cfs\CalculateInterfacee;

class CalculateHandler implements CalculateInterface
{
    function calculate(string $input): int
    {
        return eval("return {$input};");
    }
}