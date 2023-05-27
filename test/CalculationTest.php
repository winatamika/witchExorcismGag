<?php
use PHPUnit_Framework_TestCase;
require_once '../Classes/Calculation.php'; // Include the Calculation class file

class CalculationTest extends PHPUnit_Framework_TestCase
{
    public function testGetKillingCount()
    {
        $calculation = new Calculation();

        // Test case 1: Year is 12, Age is 10
        $result1 = $calculation->getKillingCount(12, 10);
        $this->assertEquals(2, $result1);

        // Test case 2: Year is 17, Age is 13
        $result2 = $calculation->getKillingCount(17, 13);
        $this->assertEquals(7, $result2);

        // Additional test cases...
    }

    public function testGetAverage()
    {
        $calculation = new Calculation();

        // Test case 1: Array [50, 60, 70, 80, 90]
        $result1 = $calculation->getAverage(array(50, 60, 70, 80, 90));
        $this->assertEquals(70, $result1);

        // Test case 2: Array [10, 20, 30, 40, 50]
        $result2 = $calculation->getAverage(array(10, 20, 30, 40, 50));
        $this->assertEquals(30, $result2);

        // Additional test cases...
    }
}