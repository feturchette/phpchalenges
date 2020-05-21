<?php

namespace Tests\DateCalculation;

use DateTime;
use Exception;
use PHPUnit\Framework\TestCase;
use src\DateCalculation\DateCalculation;

class DateCalculationTest extends TestCase
{
    /**
     * @param string $dateTime
     * @param string $expected
     * @dataProvider getNextDrawDateTimeProvider
     */
    public function testGetNextDrawDateTime(string $dateTime, string $expected): void
    {
        $object = new DateCalculation();
        $result = $object->getNextDrawDateTime($dateTime)->format('l Y-m-d');

        $this->assertEquals($expected, $result);
    }

    public function getNextDrawDateTimeProvider(): array
    {
        return [
            ['2020-05-20 08:00:00', 'Wednesday 2020-05-20'],
            ['2020-05-22 17:00:00', 'Saturday 2020-05-23'],
            ['2020-05-23 19:00:00', 'Saturday 2020-05-23'],
            ['2020-05-24 20:00:00', 'Wednesday 2020-05-27'],
            ['2020-05-27 19:59:00', 'Wednesday 2020-05-27'],
            ['2020-05-27 20:00:00', 'Saturday 2020-05-30'],
            ['2020-05-20 8 AM', 'Wednesday 2020-05-20'],
            ['2020-05-22 5 PM', 'Saturday 2020-05-23'],
            ['2020-05-23 7 PM', 'Saturday 2020-05-23'],
            ['2020-05-24 8 PM', 'Wednesday 2020-05-27'],
            ['2020-05-27 7:59 PM', 'Wednesday 2020-05-27'],
            ['2020-05-27 8:00 PM', 'Saturday 2020-05-30'],
        ];
    }
}