<?php

namespace src\FizzBuzz\Rules;

interface MultipleInterface 
{
    public function validate(int $number): bool;

    public function render(): string;
}
