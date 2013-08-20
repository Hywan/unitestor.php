<?php

namespace UniTestor {

class Robot {

    const ENERGY_RECHARGING = .1;

    protected $_clock       = null;
    protected $_energy      = 1.0;
    protected $_coordinates = null;
    protected $_landSensor  = null;



    public function __construct ( ) {

        $this->_clock       = new Clock();
        $this->_clock->reset();
        $this->_coordinates = new Coordinates(0, 0);
        $this->_landSensor  = new LandSensor();

        return;
    }

    public function move ( $direction ) {

        $x = $this->getCoordinates()->getX();
        $y = $this->getCoordinates()->getY();

        foreach(explode(' ', $direction) as $dir)
            switch($dir) {

                case 'right':
                    $x += 1;
                  break;

                case 'left':
                    $x -= 1;
                  break;

                case 'up':
                    $y += 1;
                  break;

                case 'down':
                    $y -= 1;
                  break;
            }

        return $this->moveTo(new Coordinates($x, $y));
    }

    public function moveTo ( Coordinates $coordinates ) {

        $energy     = $this->getEnergy();
        $vector     = new Vector($this->getCoordinates(), $coordinates);
        $cost       = $this->getLandSensor()->getNeededEnergy($vector);
        $nextEnergy = $energy - $energy * $cost;

        if(0 >= $nextEnergy)
            return false;

        $this->_energy      = $nextEnergy;
        $this->_coordinates = $coordinates;

        sleep($vector->getLength());

        return true;
    }

    public function wait ( $seconds ) {

        sleep($seconds);

        return;
    }

    public function getCoordinates ( ) {

        return $this->_coordinates;
    }

    public function getEnergy ( ) {

        $diff          = $this->_clock->getDifference();
        $this->_energy = min(1.0, $this->_energy + $diff * static::ENERGY_RECHARGING);
        $this->_clock->reset();

        return $this->_energy;
    }

    public function getLandSensor ( ) {

        return $this->_landSensor;
    }
}

}
