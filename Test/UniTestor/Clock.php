<?php

namespace Test\UniTestor {

class Clock extends \Test {

    public function testTimestamp ( ) {

        $this
            ->if($clock = new \UniTestor\Clock())
            ->then
                ->integer($clock->getTimestamp())
            ;
    }

    public function testResetReturn ( ) {

        $this
            ->if($clock = new \UniTestor\Clock())
            ->then
                ->object($clock->reset())
                    ->isIdenticalTo($clock)
            ;
    }

    public function testReset ( ) {

        $this
            ->given($clock = new \UniTestor\Clock())
            ->and($previousTime = $clock->getTimestamp())

            ->if($delay = 10)
            ->and($nextTime = $previousTime + $delay)

            ->and($this->function->time = $nextTime)
            ->and($clock->reset())

            ->then
                ->integer($clock->getTimestamp())
                    ->isGreaterThan($previousTime)
                    ->isEqualTo($previousTime + $delay)
            ;
    }
}

}
