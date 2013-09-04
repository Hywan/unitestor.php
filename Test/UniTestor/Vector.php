<?php

namespace Test\UniTestor {

class Vector extends \Test {

    public function testC1C2 ( ) {

        $c1 = new \UniTestor\Coordinates(0, 0);
        $c2 = new \UniTestor\Coordinates(0, 0);

        $this
            ->if($vector = new \UniTestor\Vector($c1, $c2))
            ->then
                ->object($vector->getFirstCoordinates())
                    ->isIdenticalTo($c1)
                ->object($vector->getSecondCoordinates())
                    ->isIdenticalTo($c2)
            ;
    }

    public function testLengthSimple ( ) {

        $this
            ->if($vector = new \UniTestor\Vector(
                new \UniTestor\Coordinates(0, 0),
                new \UniTestor\Coordinates(3, 4)
            ))
            ->then
                ->float($vector->getLength())
                    ->isEqualTo(5.0);
            ;
    }

    public function testLength ( ) {

        $this
            ->if($vector = new \UniTestor\Vector(
                new \UniTestor\Coordinates(0, 0),
                new \UniTestor\Coordinates(3, 2)
            ))
            ->then
                ->float($vector->getLength())
                    ->isNearlyEqualTo(3.605551275464)
            ;
    }
}

}
