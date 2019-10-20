<?php


namespace darthshell\cfs;

class CalculateFromString
{
    private $ci;

    function __construct(CalculateInterface $ci)
    {
        $this->ci = $ci;
    }

    function calculate(string $input): string
    {
        return $this->ci->calculate($input);
    }
}