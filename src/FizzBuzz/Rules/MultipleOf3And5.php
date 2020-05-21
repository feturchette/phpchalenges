<?php

namespace src\FizzBuzz\Rules;

class MultipleOf3And5 implements MultipleInterface 
{
    public function validate(int $number): bool 
    {
        return $number % 3 == 0 && $number % 5 == 0;
    }

    public function render(): string 
    {
        return 'FizzBuzz';
    }
}
