<?php

namespace src\FizzBuzz;

use src\FizzBuzz\Rules\MultipleInterface;

class FizzBuzz
{
    protected $rules = [];

    public function addRule(MultipleInterface $rule): void
    {
        $this->rules[] = $rule;
    }

    public function validateNumber(int $number): string
    {
        foreach ($this->rules as $rule) {
            if ($rule->validate($number)) {
                return $rule->render();
            }
        }

        return strval($number);
    }

    public function validateArray(array $array): array
    {
        $result = array_map(function ($number) {
            return $this->validateNumber($number);
        }, $array);

        return $result;
    }
}
