<?php

namespace UniTestor {

class Clock {

    protected $_date = null;



    public function __construct ( ) {

        $this->reset();

        return;
    }

    public function reset ( ) {

        if(null === $this->_date)
            $this->_date = new \DateTime();
        else
            $this->_date->setTimestamp($this->getCurrentTime());

        return $this;
    }

    public function getDifference ( ) {

        return $this->getCurrentTime() - $this->getTimestamp();
    }

    public function getTimestamp ( ) {

        return $this->_date->getTimestamp();
    }

    public function getCurrentTime ( ) {

        return time();
    }
}

}
