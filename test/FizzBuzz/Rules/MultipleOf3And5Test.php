<?php

namespace Test\FizzBuzz\Rules;

use src\FizzBuzz\Rules\MultipleOf3And5;
use PHPUnit\Framework\TestCase;

class MultipleOf3And5Test extends TestCase 
{
    protected $object;

    public function setup(): void 
    {
        $this->object = new MultipleOf3And5();
    }

    public function testValidateTrue() 
    {
        $this->assertTrue($this->object->validate(15));
    }

    public function testValidateFalse() 
    {
        $this->assertFalse($this->object->validate(4));
    }

    public function testRender() 
    {
        $this->assertEquals('FizzBuzz', $this->object->render());
    }
}
