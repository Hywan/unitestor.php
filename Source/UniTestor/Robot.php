<?php

namespace UniTestor {

class Robot {

    const ENERGY_RECHARGING = .1;

    /**
     * @invariant _clock: class('\UniTestor\Clock');
     */
    protected $_clock       = null;

    /**
     * @invariant _energy: 0.0..1.0;
     */
    protected $_energy      = 1.0;

    /**
     * @invariant _coordinates: class('\UniTestor\Coordinates');
     */
    protected $_coordinates = null;

    /**
     * @invariant _landSensor: class('\UniTestor\LandSensor');
     */
    protected $_landSensor  = null;



    /**
     * @requires clock:      class('\UniTestor\Clock') or void
     *       and landSensor: class('\UniTestor\LandSensor') or void;
     * @ensures \result: void;
     */
    public function __construct ( Clock      $clock      = null,
                                  LandSensor $landSensor = null ) {

        $this->_clock       = $clock ?: new Clock();
        $this->_clock->reset();
        $this->_coordinates = new Coordinates(0, 0);
        $this->_landSensor  = $landSensor ?: new LandSensor();

        return;
    }

    /**
     * @requires direction: /^(right|left|up|down)( +(right|left|up|down))*$/;
     * @ensures \result: boolean();
     */
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

    /**
     * @requires coordinates: class('\UniTestor\Coordinates');
     * @ensures  this->_coordinates: coordinates
     *       and \result: boolean();
     */
    public function moveTo ( Coordinates $coordinates ) {

        $energy     = $this->getEnergy();
        $vector     = new Vector($this->getCoordinates(), $coordinates);
        $cost       = $this->getLandSensor()->getNeededEnergy($vector);
        $nextEnergy = $energy - $energy * $cost;

        if(0 >= $nextEnergy)
            return false;

        $this->_energy      = $nextEnergy;
        $this->_coordinates = $coordinates;

        sleep($this->getTimeToReach($vector));

        return true;
    }

    /**
     * @requires vector: class('\UniTestor\Vector');
     * @ensures  \result: 0.0..;
     */
    public function getTimeToReach ( Vector $vector ) {

        return $vector->getLength();
    }

    /**
     * @ensures \result: this->_clock;
     */
    public function getClock ( ) {

        return $this->_clock;
    }

    /**
     * @ensures \result: this->_coordinates;
     */
    public function getCoordinates ( ) {

        return $this->_coordinates;
    }

    /**
     * @behavior loaded {
     *     @requires this->_energy: 1.0;
     *     @ensures  this->_energy: \old(this->energy);
     * }
     * @behavior not_loading {
     *     @requires this->_clock->getDifference: 0;
     *     @ensures  this->_energy: \old(this->_energy);
     * }
     * @behavior loading {
     *     @ensures this->_energy > \old(this->_energy);
     * }
     * @ensures  \result: this->_energy;
     */
    public function getEnergy ( ) {

        $diff          = $this->_clock->getDifference();
        $this->_energy = min(1.0, $this->_energy + $diff * static::ENERGY_RECHARGING);
        $this->_clock->reset();

        return $this->_energy;
    }

    /**
     * @ensures \result: this->_landSensor;
     */
    public function getLandSensor ( ) {

        return $this->_landSensor;
    }
}

}
