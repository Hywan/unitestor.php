<?php

namespace Test\UniTestor {

class Robot extends \Test {

    public function testDefaultConstruction ( ) {

        $this
            ->if($robot = new \UniTestor\Robot())
            ->then
                ->object($robot->getClock())
                    ->isInstanceOf('\UniTestor\Clock')

                ->object($coordinates = $robot->getCoordinates())
                    ->isInstanceOf('\UniTestor\Coordinates')
                ->float($coordinates->getX())
                    ->isEqualTo(0.0)
                ->float($coordinates->getY())
                    ->isEqualTo(0.0)

                ->float($robot->getEnergy())
                    ->isEqualTo(1.0)

                ->object($robot->getLandSensor())
                    ->isInstanceOf('\UniTestor\LandSensor');
            ;
    }

    public function testSpecificConstruction ( ) {

        $this
            ->given($clock = new \UniTestor\Clock())
            ->given($landSensor = new \UniTestor\LandSensor())
            ->if($robot = new \UniTestor\Robot($clock, $landSensor))
            ->then
                ->object($robot->getClock())
                    ->isIdenticalTo($clock)

                ->object($robot->getLandSensor())
                    ->isIdenticalTo($landSensor)
            ;
    }

    public function testMoveToCoordinates ( ) {

        $this
            ->given($coordinates = new \UniTestor\Coordinates(3, 2))

            ->if($robot = new \UniTestor\Robot())
            ->and($this->function->sleep = null)
            ->and($robot->moveTo($coordinates))

            ->then
                ->object($robot->getCoordinates())
                    ->isEqualTo($coordinates)
            ;
    }

    protected function genericMove ( $direction, $x, $y ) {

        $this
            ->if($robot = new \UniTestor\Robot())
            ->and($this->function->sleep = null)
            ->and($robot->move($direction))

            ->then
                ->object($coordinates = $robot->getCoordinates())
                ->float($coordinates->getX())
                    ->isEqualTo($x)
                ->float($coordinates->getY())
                    ->isEqualTo($y)
            ;
    }

    public function testMoveUp ( ) {

        $this->genericMove('up', 0.0, 1.0);
    }

    public function testMoveDown ( ) {

        $this->genericMove('down', 0.0, -1.0);
    }

    public function testMoveRight ( ) {

        $this->genericMove('right', 1.0, 0.0);
    }

    public function testMoveLeft ( ) {

        $this->genericMove('left', -1.0, 0.0);
    }

    public function testMoveUpRightDownLeft ( ) {

        $this->genericMove('up right down left', 0.0, 0.0);
    }
}

}
