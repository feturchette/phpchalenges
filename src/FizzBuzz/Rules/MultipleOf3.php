<?php

namespace src\FizzBuzz\Rules;

class MultipleOf3 implements MultipleInterface 
{
    public function validate(int $number): bool 
    {
        return $number % 3 == 0;
    }

    public function render(): string 
    {
        return 'Fizz';
    }
}
