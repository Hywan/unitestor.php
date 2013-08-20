<?php

namespace UniTestor {

class Vector {

    /**
     * @invariant _c1: class('\UniTestor\Coordinates');
     */
    protected $_c1 = null;

    /**
     * @invariant _c2: class('\UniTestor\Coordinates');
     */
    protected $_c2 = null;



    /**
     * @requires c1: class('\UniTestor\Coordinates')
     *       and c2: class('\UniTestor\Coordinates');
     * @ensures \result: void;
     */
    public function __construct ( Coordinates $c1, Coordinates $c2 ) {

        $this->_c1 = $c1;
        $this->_c2 = $c2;

        return;
    }

    /**
     * @ensures \result: this->_c1;
     */
    public function getFirstCoordinates ( ) {

        return $this->_c1;
    }

    /**
     * @ensures \result: this->_c2;
     */
    public function getSecondCoordinates ( ) {

        return $this->_c2;
    }

    /**
     * @ensures \result: 0.0..;
     */
    public function getLength ( ) {

        return sqrt(
            pow($this->_c2->getX() - $this->_c1->getX(), 2)
          + pow($this->_c2->getY() - $this->_c1->getY(), 2)
        );
    }
}

}
