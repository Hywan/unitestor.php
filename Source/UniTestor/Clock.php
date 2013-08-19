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
            $this->_date->setTimestamp(time());

        return $this;
    }

    public function getDifference ( ) {

        return time() - $this->getTimestamp();
    }

    public function getTimestamp ( ) {

        return $this->_date->getTimestamp();
    }
}

}
