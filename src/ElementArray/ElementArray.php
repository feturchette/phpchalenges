<?php

namespace src\ElementArray;

class ElementArray 
{
    public function searchRemovedNumberFromArray(): int
    {
        return $this->getRemovedNumberFromArray($this->populateArray());
    }

    protected function populateArray(int $maximum = 500): array
    {
        $array = [];
        for ($i = 0; $i < $maximum; $i++) {
            $array[] = mt_rand(1, $maximum);
        }

        return $array;
    }

    /**
     * Calculating the sum of the array twice and subtracting both sums reveals the missing number
     * Speed O(n) and Storage O(1)
     */
    private function getRemovedNumberFromArray(array $sequence) : int
    {
        $sum = array_sum($sequence);
        
        $random = $this->getRandomNumber(count($sequence));
        unset($sequence[$random]);
        
        $newSum = array_sum($sequence);

        return $sum - $newSum;
    }

    protected function getRandomNumber(int $maximum): int
    {
        return mt_rand(0, $maximum - 1);
    }
}
