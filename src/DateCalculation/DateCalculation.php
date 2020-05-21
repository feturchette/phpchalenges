<?php

namespace src\DateCalculation;

use DateTime;

class DateCalculation 
{
    private const LOTTERY_TIME = '20';
    
    private $lotteryDays;

    public function getNextDrawDateTime(string $dateTime = null): DateTime
    {
        $this->lotteryDays = $this->getLotteryDays();
        $newDate = $this->getDate($dateTime);

        return $this->isLotteryDay($newDate) ? 
            $newDate->modify(self::LOTTERY_TIME . ":00:00") :
            $this->findNextDrawDateTime($dateTime, $newDate);
    }

    private function getLotteryDays(): array
    {
        return ['wednesday', 'saturday'];
    }

    private function getDate(string $dateTime = null): DateTime
    {
        return $dateTime !== null ? new DateTime($dateTime) : new DateTime();
    }

    private function isLotteryDay(DateTime $datetime): bool
    {
        $hour = (int)$datetime->format('H');

        if ($hour < (int) self::LOTTERY_TIME) {
            $day = strtolower($datetime->format('l'));

            foreach ($this->lotteryDays as $lotteryDay) {
                if ($day === $lotteryDay) {
                    return true;
                }
            }
            
        }

        return false;
    }

    private function findNextDrawDateTime(string $dateTime = null, DateTime $newDate) : DateTime
    {
        $nextLoterryDay = $newDate;
        $lesserDifference = INF;
        foreach ($this->lotteryDays as $lotteryDay) {
            $nextday = $this->getDate($dateTime)->modify('next ' . $lotteryDay);

            $nextdifference = date_diff($nextday, $newDate)->days;
            if ($nextdifference < $lesserDifference) {
                $lesserDifference = $nextdifference;
                $nextLoterryDay = $nextday;
            }
        }

        return $nextLoterryDay;
    }
}
