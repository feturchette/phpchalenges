<?php

namespace src\FizzBuzz\Rules;

class MultipleOf5 implements MultipleInterface {

    public function validate(int $number): bool {
        return $number % 5 == 0;
    }

    public function render(): string {
        return 'Buzz';
    }
}
