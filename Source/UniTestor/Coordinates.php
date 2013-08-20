<?php

namespace UniTestor {

class Coordinates {

    /**
     * @invariant _x: 0.0..;
     */
    protected $_x = 0.0;

    /**
     * @invariant _y: 0.0..;
     */
    protected $_y = 0.0;



    /**
     * @requires x: 0.. or 0.0..
     *      and  y: 0.. or 0.0..;
     * @ensures this->_x: constfloat(x)
     *      and this->_y: constfloat(y)
     *      and \result: void;
     */
    public function __construct ( $x, $y ) {

        $this->_x = (float) $x;
        $this->_y = (float) $y;

        return;
    }

    /**
     * @ensures \result: this->_x;
     */
    public function getX ( ) {

        return $this->_x;
    }

    /**
     * @ensures \result: this->_y;
     */
    public function getY ( ) {

        return $this->_y;
    }
}

}
