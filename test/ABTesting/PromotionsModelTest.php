<?php

namespace Tests\DateCalculation;

use PHPUnit\Framework\TestCase;
use src\ABTesting\PromotionsModel;
use PDO;

class PromotionsModelTest extends TestCase
{
    /**
     * @param string $random
     * @param string $expected
     * @dataProvider designsProvider
     */
    public function testABDesigns($random, $expected): void
    {
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=challengedb", "challengeuser", "challengepassword");

        $promotions = $this->getMockBuilder(PromotionsModel::class)
            ->setConstructorArgs([$pdo])
            ->setMethods(['getRandomNumber'])
            ->getMock();
        $promotions->expects($this->once())
        ->method('getRandomNumber')
        ->willReturn($random);

        $design = $promotions->selectDesign();

        $this->assertEquals($expected, $design);
    }

    public function designsProvider(): array
    {
        return [
            [0, 'Design 1'],
            [1, 'Design 1'],
            [30, 'Design 1'],
            [50, 'Design 1'],
            [51, 'Design 2'],
            [74, 'Design 2'],
            [75, 'Design 2'],
            [76, 'Design 3'],
            [100, 'Design 3'],
        ];
    }
}