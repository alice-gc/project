<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\calculatorService;
class CalculatorTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_addition()
    {
        $calculator = new calculatorService();
        $this->assertTrue($calculator->add(1, 2) == 3, '1 and 2 is equal to value of 3');
        $this->assertEquals($calculator->add(1, 2), 3);

    }

    public function test_addition_negative_number()
    {
        $calculator = new calculatorService();
        $this->assertEquals($calculator->add(-1, -2), -3);
        $this->assertEquals($calculator->add(-1, 10), 9);
        $this->assertEquals($calculator->add(3, -7), -4);


    }

    public function test_calculator_error_non_number()
    {
    //
    }

    public function test_floating_point_addition()
    {
    //
    }

    public function test_large_number_addition()
    {
    //
    }
    public function test_subtraction()
    { //

        $calculator = new calculatorService();
        $this->assertEquals($calculator->sub(8, 2), 6);
    }

    public function test_multiplication()
    { //
    }
}

//multiply by zero
//devide by zero
//floating point operation additions
