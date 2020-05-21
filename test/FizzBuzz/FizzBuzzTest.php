<?php

namespace Test\FizzBuzz;

use src\FizzBuzz\FizzBuzz;
use src\FizzBuzz\Rules\MultipleOf3;
use src\FizzBuzz\Rules\MultipleOf3And5;
use src\FizzBuzz\Rules\MultipleOf5;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase 
{
    protected $fizzBuzz;

    public function setup(): void
    {
        $this->fizzBuzz = new FizzBuzz();
        $this->fizzBuzz->addRule(new MultipleOf3And5);
        $this->fizzBuzz->addRule(new MultipleOf3);
        $this->fizzBuzz->addRule(new MultipleOf5);
    }

    public function testValidateNumber()
    {
        $this->assertEquals('4', $this->fizzBuzz->validateNumber(4));
        $this->assertEquals('Fizz', $this->fizzBuzz->validateNumber(3));
        $this->assertEquals('Buzz', $this->fizzBuzz->validateNumber(5));
        $this->assertEquals('FizzBuzz', $this->fizzBuzz->validateNumber(15));
    }

    public function testValidateArray()
    {
        $this->assertEquals(['4', 'Fizz', 'Buzz', 'FizzBuzz'], $this->fizzBuzz->validateArray([4, 3, 5, 15]));
    }
}
