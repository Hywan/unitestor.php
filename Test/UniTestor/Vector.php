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

    /*
    public function testFoo ( ) {

        $this
            ->if($this->sampler['x']->in = realdom()->boundinteger(3, 92))
            ->then
                ->boolean($this->sampler['x']->predicate(5))
                    ->isTrue();
    }
    */
}

}
