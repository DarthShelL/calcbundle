<?php


namespace DarthShelL\CalculateFromStringBundle;


interface CalculateInterface
{
    function calculate(string $input): int;
}