<?php


namespace darthshell\cfs;

class CalculateFromString
{
    private $ci;

    function __construct(CalculateInterface $ci=null)
    {
        $this->ci = $ci??new CalculateHandler();
    }

    function calculate(string $input): string
    {
        return $this->ci->calculate($input);
    }
}