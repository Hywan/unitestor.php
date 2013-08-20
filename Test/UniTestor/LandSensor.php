<?php

namespace Test\UniTestor {

class LandSensor extends \Test {

    public function testNeedEnergy ( ) {

        $this
            ->if($landSensor = new \UniTestor\LandSensor())
            ->and($this->function->mt_rand = 20)

            ->and($this->mockGenerator->orphanize('__construct'))
            ->and($vector = new \Mock\UniTestor\Vector())
            ->and($this->calling($vector)->getLength = 10)

            ->then
                ->float($landSensor->getNeededEnergy($vector))
                    ->isEqualTo(2.0)
            ;
    }
}

}
