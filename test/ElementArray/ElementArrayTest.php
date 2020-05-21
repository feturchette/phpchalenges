<?php

namespace Test\ElementArray;

use src\ElementArray\ElementArray;
use PHPUnit\Framework\TestCase;

class ElementArrayTest extends TestCase {

    /**
     * @param string $random
     * @param string $expected
     * @dataProvider removedNumberFromArrayProvider
     */
    public function testRemovedNumberFromArray($random)
    {
        $array = [];

        for ($i = 0; $i < 500; $i++) {
            $array[] = mt_rand(1, 500);
        }

        $expected = $array[$random];

        $object = $this->getMockBuilder(ElementArray::class)
            ->setMethods(['getRandomNumber', 'populateArray'])
            ->getMock();
        $object->expects($this->once())
            ->method('populateArray')
            ->willReturn($array);
        $object->expects($this->once())
            ->method('getRandomNumber')
            ->willReturn($random);

        $result = $object->searchRemovedNumberFromArray();
        
        $this->assertEquals($expected, $result);
    }

    public function removedNumberFromArrayProvider(): array
    {
        return [
            [0],
            [53],
            [10],
            [224],
            [575],
            [37],
            [98],
            [294],
            [499],
            [456],
            [213],
            [342],
        ];
    }

}
