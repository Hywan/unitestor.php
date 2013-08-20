<?php

namespace Test\UniTestor {

class Coordinates extends \Test {

    public function testXY ( ) {

        $x = 7.0;
        $y = 42.0;

        $this
            ->if($coordinates = new \UniTestor\Coordinates($x, $y))
            ->then
                ->float($coordinates->getX())
                    ->isEqualTo($x)
                ->float($coordinates->getY())
                    ->isEqualTo($y)
            ;
    }

    public function testCast ( ) {

        $x = 7;
        $y = 42;

        $this
            ->if($coordinates = new \UniTestor\Coordinates($x, $y))
            ->then
                ->float($coordinates->getX())
                ->float($coordinates->getY())
            ;
    }
}

}
