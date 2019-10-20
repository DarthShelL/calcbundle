<?php

namespace darthshell\cfs\Tests;

use darthshell\cfs\CalculateFromString;
use PHPUnit\Framework\TestCase;

class CalculateFromStringTest extends TestCase
{
    protected $fixture;

    protected function setUp()
    {
        $this->fixture = new CalculateFromString();
    }

    protected function tearDown()
    {
        $this->fixture = NULL;
    }

    /**
     * @dataProvider provider4Exception
     */
    public function testInputCheck($input)
    {
        $this->expectException(\ErrorException::class);
        $this->fixture->calculate($input);
    }

    public function testReturnedType()
    {
        $result = $this->fixture->calculate('2+2*2');
        $this->assertTrue(is_string($result), "Got a " . gettype($result) . " instead of a string");
    }

    /**
     * @dataProvider provider4Calculation
     */
    public function testCalculation($input, $result)
    {
        $this->assertEquals($result, $this->fixture->calculate($input));
    }

    public function provider4Calculation()
    {
        return [
            ['2+2*2', '6'],
            ['2+2/2', '3'],
            ['2+2*10', '22'],
            ['23/2', '11.5'],
            ['2/32*5', '0.3125']
        ];
    }

    public function provider4Exception()
    {
        return [
            ['250%-20'],
            ['abc'],
            ['20/0'],
            ['20/ 0'],
            ['20/* 7'],
            ['20-+ 7'],
            ['20/-2'],
            ['5+.3'],
            ['* 23 - 345'],
            ['34/67/'],
            ['34 / 6 7 /'],
        ];
    }
}