<?php

namespace UniTestor {

class Clock {

    /**
     * @invariant _date: class('\DateTime');
     */
    protected $_date = null;



    /**
     * @ensures \result: void;
     */
    public function __construct ( ) {

        $this->reset();

        return;
    }

    /**
     * @ensures \result: this;
     */
    public function reset ( ) {

        if(null === $this->_date)
            $this->_date = new \DateTime();
        else
            $this->_date->setTimestamp($this->getCurrentTime());

        return $this;
    }

    /**
     * @ensures \result: integer();
     */
    public function getDifference ( ) {

        return $this->getCurrentTime() - $this->getTimestamp();
    }

    /**
     * @ensures \result: integer();
     */
    public function getTimestamp ( ) {

        return $this->_date->getTimestamp();
    }

    /**
     * @ensures \result: date('U');
     */
    public function getCurrentTime ( ) {

        return time();
    }
}

}
