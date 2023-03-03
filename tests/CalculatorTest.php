<?php


namespace Dfj\PointCalc;

use PHPUnit\Framework\TestCase;
use PointCalc\Calculator;
use PointCalc\Exceptions\LowLevelGraduateException;
use PointCalc\Exceptions\RequiredSubNotFoundException;

final class CalculatorTest extends TestCase
{


    public function testCalculator()
    {
        global $exampleData, $exampleData1, $exampleData2, $exampleData3;
        
        $calc = new Calculator($exampleData);
        $this->assertEquals(370, $calc->basePoints());
        $this->assertEquals(100, $calc->additionalPoints());
        $this->assertEquals(470, $calc->basePoints() + $calc->additionalPoints());
        $calc = new Calculator($exampleData1);
        $this->assertEquals(376, $calc->basePoints());
        $this->assertEquals(100, $calc->additionalPoints());
        $this->assertEquals(476, $calc->basePoints() + $calc->additionalPoints());
        $calc = new Calculator($exampleData2);
        try {
            $p = $calc->basePoints();
        } catch (RequiredSubNotFoundException $e) {
            $this->assertEquals(991, $e->getCode());
        }
        $calc = new Calculator($exampleData3);
        try {
            $p = $calc->basePoints();
        } catch (LowLevelGraduateException $e) {
            $this->assertEquals(990, $e->getCode());
        }
    }
}