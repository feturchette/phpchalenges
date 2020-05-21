<?php

namespace Test\FizzBuzz\Rules;

use src\FizzBuzz\Rules\MultipleOf5;
use PHPUnit\Framework\TestCase;

class MultipleOf5Test extends TestCase 
{
    protected $object;

    public function setup(): void {
        $this->object = new MultipleOf5();
    }

    public function testValidateTrue() {
        $this->assertTrue($this->object->validate(5));
    }

    public function testValidateFalse() {
        $this->assertFalse($this->object->validate(4));
    }

    public function testRender() {
        $this->assertEquals('Buzz', $this->object->render());
    }
}
