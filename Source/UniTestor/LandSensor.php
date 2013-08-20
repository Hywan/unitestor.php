<?php

namespace UniTestor {

class LandSensor {

    /**
     * @requires vector: class('\UniTestor\Vector');
     * @ensures  \result: 0.0..;
     */
    public function getNeededEnergy ( Vector $vector ) {

        return $vector->getLength() * (mt_rand(15, 25) / 100);
    }
}

}
