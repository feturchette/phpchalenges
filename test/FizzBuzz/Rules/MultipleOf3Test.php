<?php

namespace Test\FizzBuzz\Rules;

use src\FizzBuzz\Rules\MultipleOf3;
use PHPUnit\Framework\TestCase;

class MultipleOf3Test extends TestCase 
{
    protected $object;

    public function setup(): void 
    {
        $this->object = new MultipleOf3();
    }

    public function testValidateTrue() 
    {
        $this->assertTrue($this->object->validate(3));
    }

    public function testValidateFalse() 
    {
        $this->assertFalse($this->object->validate(4));
    }

    public function testRender() 
    {
        $this->assertEquals('Fizz', $this->object->render());
    }
}
